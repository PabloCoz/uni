<?php

namespace App\Http\Livewire\Admin\Courses\Schedules;

use App\Models\Course;
use Livewire\Component;

class ScheduleIndex extends Component
{
    public $course, $schedule, $schedule_id, $day, $start_time, $end_time, $status = 1;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->schedule = $course->schedules;
    }

    public function render()
    {
        return view('livewire.admin.courses.schedules.schedule-index');
    }
}
