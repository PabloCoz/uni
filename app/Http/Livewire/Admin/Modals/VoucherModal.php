<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\Postulant;
use Livewire\Component;

class VoucherModal extends Component
{
    public $postulant;

    public function mount(Postulant $postulant)
    {
        $this->postulant = $postulant;
    }

    public function render()
    {
        return view('livewire.admin.modals.voucher-modal');
    }

    public function download()
    {
        return response()->download(storage_path('app/public/' . $this->postulant->voucher));
    }
}
