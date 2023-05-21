<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;

class CourseUser extends Component
{
    public function render()
    {
        $courses = auth()->user()->courses_enrolled()->get();
        return view('livewire.courses.course-user', compact('courses'));
    }
}
