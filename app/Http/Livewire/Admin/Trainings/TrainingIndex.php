<?php

namespace App\Http\Livewire\Admin\Trainings;

use App\Models\Training;
use Livewire\Component;
use Livewire\WithPagination;

class TrainingIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $trainings = Training::where('title', 'LIKE', '%' . $this->search . '%')
            ->orWhere('description', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);
        return view('livewire.admin.trainings.training-index', compact('trainings'));
    }
}
