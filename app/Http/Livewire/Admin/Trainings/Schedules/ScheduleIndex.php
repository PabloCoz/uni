<?php

namespace App\Http\Livewire\Admin\Trainings\Schedules;

use App\Models\Schedule;
use App\Models\Training;
use Livewire\Component;

class ScheduleIndex extends Component
{
    public $training, $selected;

    protected $listeners = ['render'];

    public function mount(Training $training)
    {
        $this->training = $training;
    }

    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.admin.trainings.schedules.schedule-index', compact('schedules'));
    }

    public function store()
    {
        $this->validate([
            'selected' => 'required'
        ]);

        $this->training->schedules()->attach($this->selected);

        $this->reset('selected');

        $this->emitSelf('render');
    }

    public function clearSchedule()
    {
        $this->training->schedules()->detach();

        $this->emitSelf('render');
    }
}
