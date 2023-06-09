<?php

namespace App\Http\Livewire\Trainings;

use App\Models\Training;
use Livewire\Component;

class TrainingStatus extends Component
{
    public $training;

    public function mount(Training $training)
    {
        $this->training = $training;
    }

    public function render()
    {
        $this->autorize('enrolled', $this->course);
        return view('livewire.trainings.training-status');
    }
}
