<?php

namespace App\Http\Livewire\Courses;

use App\Models\Lesson;
use App\Models\Resource;
use Livewire\Component;

class LessonResources extends Component
{
    public $lesson;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.courses.lesson-resources');
    }

    public function download($file)
    {
        $resource =  Resource::find($file);
        return response()->download(storage_path('app/public/' . $resource->url));
    }
}
