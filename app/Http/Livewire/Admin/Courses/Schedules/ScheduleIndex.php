<?php

namespace App\Http\Livewire\Admin\Courses\Schedules;

use App\Models\Course;
use App\Models\Schedule;
use Livewire\Component;

class ScheduleIndex extends Component
{
    public $course, $selected;

    protected $listeners = ['render'];

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.admin.courses.schedules.schedule-index', compact('schedules'));
    }

    public function store()
    {
        $this->validate([
            'selected' => 'required'
        ]);

        $this->course->schedules()->attach($this->selected);

        $this->reset('selected');

        $this->emitSelf('render');
    }

    public function clearSchedule()
    {
        $this->course->schedules()->detach();

        $this->emitSelf('render');
    }
}
