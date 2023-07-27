<?php

namespace App\Http\Livewire\Workshops;

use App\Models\Workshop;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class WorkshopStatus extends Component
{
    use AuthorizesRequests;
    public $workshop;

    public function mount(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    public function render()
    {
        $this->authorize('enrolled', $this->course);
        return view('livewire.workshops.workshop-status');
    }
}
