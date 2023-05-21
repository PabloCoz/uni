<?php

namespace App\Http\Livewire\Admin\Courses\Students;

use Livewire\Component;

class StudentIndex extends Component
{
    public $course;

    public function render()
    {
        $students = $this->course->students;
        return view('livewire.admin.courses.students.student-index', compact('students'));
    }
}
