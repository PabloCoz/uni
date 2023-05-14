<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $courses = Course::where('status', Course::PUBLICADO)->latest('id')->paginate(8);
        return view('livewire.courses.course-index', compact('courses'));
    }
}
