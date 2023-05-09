<?php

namespace App\Http\Livewire\Admin\Modals;

use Livewire\Component;

class VoucherModal extends Component
{
    public $show = false;

    public function render()
    {
        return view('livewire.admin.modals.voucher-modal');
    }



}
