<?php

namespace App\Http\Livewire\Admin\Trainings\Themes;

use App\Models\Theme;
use App\Models\Training;
use Livewire\Component;

class ThemeIndex extends Component
{
    public $training, $theme, $name, $description;

    protected $rules = [
        'theme.name' => 'required',
        'theme.description' => 'required',
    ];

    public function mount(Training $training)
    {
        $this->training = $training;
        $this->theme = new Theme();
    }

    public function render()
    {
        return view('livewire.admin.trainings.themes.theme-index');
    }

    public function edit(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function update()
    {
        $this->validate();
        $this->theme->save();
        $this->theme = new Theme();

        $this->training = Training::find($this->training->id);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        Theme::create([
            'name' => $this->name,
            'description' => $this->description,
            'training_id' => $this->training->id
        ]);

        $this->reset('name');

        $this->training = Training::find($this->training->id);
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        $this->training = Training::find($this->training->id);
    }
}
