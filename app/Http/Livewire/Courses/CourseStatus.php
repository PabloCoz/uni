<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $this->autorize('enrolled', $this->course);
        return view('livewire.courses.course-status');
    }
}
