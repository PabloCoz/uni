<?php

namespace App\Http\Livewire\Admin\Courses\Modules;

use App\Models\Course;
use App\Models\Module;
use Livewire\Component;

class ModuleIndex extends Component
{
    public $course, $module, $name;

    protected $rules = [
        'module.name' => 'required',
    ];


    public function mount(Course $course)
    {
        $this->course = $course;
        $this->module = new Module();
    }

    public function render()
    {
        return view('livewire.admin.courses.modules.module-index');
    }

    public function edit(Module $module)
    {
        $this->module = $module;
    }

    public function update()
    {
        $this->validate();
        $this->module->save();
        $this->module = new Module();

        $this->course = Course::find($this->course->id);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        Module::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);
    }

    public function destroy(Module $module)
    {
        $module->delete();
        $this->course = Course::find($this->course->id);
    }
}
