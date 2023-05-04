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
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
            ->orWhere('description', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);
        return view('livewire.admin.courses.course-index', compact('courses'));
    }
}
