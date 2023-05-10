<?php

namespace App\Http\Livewire\Admin;

use App\Models\Postulant;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PostulantTable extends Component
{
    use WithPagination;
    public $search, $open = false;

    public function render()
    {
        $postulants = Postulant::where('validated', false)
            ->where('fullname', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
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

        User::create([
            'name' => $postulant['fullname'],
            'username' => $name[0] . rand(1, 100),
            'password' => bcrypt('password'),
        ]);
    }
}
