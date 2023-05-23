<?php

namespace App\Http\Livewire\Admin\Workshops\Schedules;

use App\Models\Schedule;
use App\Models\Workshop;
use Livewire\Component;

class ScheduleIndex extends Component
{
    public $workshop, $selected;

    protected $listeners = ['render'];

    public function mount(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }
    
    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.admin.workshops.schedules.schedule-index', compact('schedules'));
    }

    public function store()
    {
        $this->validate([
            'selected' => 'required'
        ]);

        $this->workshop->schedules()->attach($this->selected);

        $this->reset('selected');

        $this->emitSelf('render');
    }

    public function clearSchedule()
    {
        $this->workshop->schedules()->detach();

        $this->emitSelf('render');
    }
}
