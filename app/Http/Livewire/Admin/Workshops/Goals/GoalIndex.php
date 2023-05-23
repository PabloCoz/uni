<?php

namespace App\Http\Livewire\Admin\Workshops\Goals;

use App\Models\Goal;
use App\Models\Workshop;
use Livewire\Component;

class GoalIndex extends Component
{
    public $goal, $workshop, $name;

    protected $rules = [
        'goal.name' => 'required',
    ];

    public function mount(Workshop $workshop)
    {
        $this->workshop = $workshop;
        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.admin.workshops.goals.goal-index');
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
        $this->workshop->goals()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->workshop = Workshop::find($this->workshop->id);
    }

    public function update()
    {
        $this->validate();
        $this->goal->save();
        $this->goal = new Goal();
        $this->workshop = Workshop::find($this->workshop->id);
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        $this->workshop = Workshop::find($this->workshop->id);
    }
}
