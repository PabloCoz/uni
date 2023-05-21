<?php

namespace App\Http\Livewire\Admin\Courses\Lessons;

use App\Models\Lesson;
use App\Models\Modality;
use App\Models\Module;
use Livewire\Component;

class LessonIndex extends Component
{
    public $readyToLoad = false;

    public $module, $lesson, $modalities, $name, $url, $modalitiy_id, $description;

    protected $rules = [
        'lesson.name' => 'required',
        'lesson.modality_id' => 'required',
        'lesson.description' => 'required',
        'lesson.url' => 'nullable|url'
    ];

    public function loadLessons()
    {
        $this->readyToLoad = true;
    }

    public function mount(Module $module)
    {
        $this->module = $module;
        $this->lesson = new Lesson();
        $this->modalities = Modality::all();
        
    }

    public function render()
    {
        return view('livewire.admin.courses.lessons.lesson-index');
    }

    public function edit(Lesson $lesson)
    {
        $this->resetValidation();
        $this->lesson = $lesson;
    }

    public function update()
    {
        
        $this->validate();

        $this->lesson->save();
        $this->lesson = new Lesson();
        $this->module = Module::find($this->module->id);
    }

    public function cancel()
    {
        $this->lesson = new Lesson();
    }
}
