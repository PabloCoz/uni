<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CourseStatus extends Component
{
    use AuthorizesRequests;
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->authorize('enrolled', $this->course);
    }

    public function render()
    {
        
        return view('livewire.courses.course-status');
    }
}
