<?php

namespace App\Http\Livewire\Admin\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        //Si tiene el rol de admin muestrame todos los cursos si no solo los del usuario autenticado
        /* if (auth()->user()->role('Admin')) {
            $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                ->orWhere('slug', 'LIKE', '%' . $this->search . '%')
                ->paginate(8);
        } else {
            $courses = Course::where('user_id', auth()->user()->id)
                ->where('title', 'LIKE', '%' . $this->search . '%')
                ->orWhere('slug', 'LIKE', '%' . $this->search . '%')
                ->paginate(8);
        } */
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
            ->orWhere('slug', 'LIKE', '%' . $this->search . '%')
            ->paginate(8);
        return view('livewire.admin.courses.course-index', compact('courses'));
    }
}
