<?php

namespace App\Http\Livewire\Admin\Trainings\Students;

use Livewire\Component;

class StudentIndex extends Component
{
    public $training;

    public function render()
    {
        $students = $this->training->users;
        return view('livewire.admin.trainings.students.student-index', compact('students'));
    }
}
