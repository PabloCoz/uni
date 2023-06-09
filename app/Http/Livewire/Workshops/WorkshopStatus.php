<?php

namespace App\Http\Livewire\Workshops;

use App\Models\Workshop;
use Livewire\Component;

class WorkshopStatus extends Component
{
    public $workshop;

    public function mount(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    public function render()
    {
        $this->autorize('enrolled', $this->course);
        return view('livewire.workshops.workshop-status');
    }
}
