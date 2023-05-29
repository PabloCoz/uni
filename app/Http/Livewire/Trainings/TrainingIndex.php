<?php

namespace App\Http\Livewire\Trainings;

use App\Models\Training;
use Livewire\Component;
use Livewire\WithPagination;

class TrainingIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $trainings = Training::where('status', Training::PUBLICADO)->latest('id')->paginate(8);
        return view('livewire.trainings.training-index', compact('trainings'));
    }
}
