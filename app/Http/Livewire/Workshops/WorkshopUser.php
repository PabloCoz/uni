<?php

namespace App\Http\Livewire\Workshops;

use Livewire\Component;

class WorkshopUser extends Component
{
    public function render()
    {
        $workshops = auth()->user()->workshops_enrolled()->get();
        return view('livewire.workshops.workshop-user', compact('workshops'));
    }
}
