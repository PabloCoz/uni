<?php

namespace App\Http\Livewire\Admin\Trainings\Goals;

use App\Models\Goal;
use App\Models\Training;
use Livewire\Component;

class GoalIndex extends Component
{
    public $training, $goal, $name;

    public function mount(Training $training)
    {
        $this->training = $training;
        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.admin.trainings.goals.goal-index');
    }

    public function edit(Goal $goal)
    {
        $this->goal = $goal;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->training->goals()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->training = Training::find($this->training->id);
    }

    public function update()
    {
        $this->validate();
        $this->goal->save();
        $this->goal = new Goal();
        $this->training = Training::find($this->training->id);
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        $this->training = Training::find($this->training->id);
    }
}
