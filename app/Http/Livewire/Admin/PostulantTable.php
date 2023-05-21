<?php

namespace App\Http\Livewire\Admin;

use App\Mail\ApprovedUser;
use App\Models\Postulant;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class PostulantTable extends Component
{
    use WithPagination;
    public $search, $open = false;

    public function render()
    {
        $postulants = Postulant::where('validated', false)
            ->when($this->search, function ($query) {
                $query->where('fullname', 'like', '%' . $this->search . '%');
                $query->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.admin.postulant-table', compact('postulants'));
    }

    public function validatedVoucher($id)
    {
        $postulant = Postulant::find($id);
        $postulant->validated = true;
        $postulant->save();
        $this->createUser($postulant);
        $this->emit('alert', 'El postulante ' . $postulant->fullname . ' ha sido validado');
    }

    public function invalidatedVoucher($id)
    {
        $postulant = Postulant::find($id);
        $postulant->validated = false;
        $postulant->save();
        $this->emit('alert', 'Pago no valido, comunicarse con el postulante ' . $postulant->fullname);
    }

    public function createUser($postulant)
    {
        $name = explode(' ', $postulant['fullname']);
        $email = $postulant['email'];

        $user = User::create([
            'email' => $email,
            'username' => $name[0] . rand(1, 100),
            'password' => bcrypt('password'),
        ]);

        Profile::create([
            'name' => $name[0],
            'lastname' => $name[1],
            'user_id' => $user->id,
        ]);

        $postulant->validated = true;

        $postulant->save();

        $mail = new ApprovedUser($user);

        Mail::to($user->email)->send($mail);
    }
}
