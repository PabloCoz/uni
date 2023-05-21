<?php

namespace App\Http\Livewire\Admin\Courses\Lessons;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonResource extends Component
{
    use WithFileUploads;

    public $lesson, $files;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }
    public function render()
    {
        return view('livewire.admin.courses.lessons.lesson-resource');
    }

    public function save()
    {
        $this->validate([
            'files.*' => 'required'
        ]);


        foreach ($this->files as $file) {
            $url = $file->store('resources');

            $this->lesson->resources()->create([
                'url' => $url,
            ]);
        }
        $this->reset(['files']);
    }

    public function destroy(Lesson $lesson)
    {
        foreach ($this->lesson->resources as $key){
            Storage::delete($key->url);
            $key->delete();
        }
        
        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function download()
    {
        foreach ($this->lesson->resources as $key) {
            return response()->download(storage_path('app/public/'. $key->url));
        }
    }
}
