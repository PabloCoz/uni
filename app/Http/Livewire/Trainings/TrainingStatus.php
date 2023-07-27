<?php

namespace App\Http\Livewire\Trainings;

use App\Models\Training;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TrainingStatus extends Component
{
    use AuthorizesRequests;
    public $training;

    public function mount(Training $training)
    {
        $this->training = $training;
    }

    public function render()
    {
        $this->authorize('enrolled', $this->course);
        return view('livewire.trainings.training-status');
    }
}
