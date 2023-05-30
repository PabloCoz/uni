<?php

namespace App\Http\Livewire\Trainings;

use Livewire\Component;

class TrainingUser extends Component
{
    public function render()
    {
        $trainings = auth()->user()->trainings_enrolled()->get();
        return view('livewire.trainings.training-user', compact('trainings'));
    }
}
