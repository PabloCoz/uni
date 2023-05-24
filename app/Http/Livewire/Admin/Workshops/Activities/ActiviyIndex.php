<?php

namespace App\Http\Livewire\Admin\Workshops\Activities;

use App\Models\Activity;
use App\Models\Modality;
use App\Models\Session;
use Livewire\Component;

class ActiviyIndex extends Component
{

    public $readyToActivity = false;

    public $session, $activity, $modalities, $name, $url, $modality_id, $description;

    protected $rules = [
        'activity.name' => 'required',
        'activity.modality_id' => 'required',
        'activity.description' => 'required',
        'activity.url' => 'nullable|url'
    ];

    public function mount(Session $session)
    {
        $this->session = $session;
        $this->activity = new Activity();
        $this->modalities = Modality::all();
    }

    public function render()
    {
        return view('livewire.admin.workshops.activities.activiy-index');
    }

    public function loadActivities()
    {
        $this->readyToActivity = true;
    }

    public function edit(Activity $activity)
    {
        $this->resetValidation();
        $this->activity = $activity;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'modality_id' => 'required',
            'description' => 'required',
            'url' => 'nullable|url'
        ]);

        Activity::create([
            'name' => $this->name,
            'modality_id' => $this->modality_id,
            'description' => $this->descriptio,
            'url' => $this->url,
            'session_id' => $this->session->id
        ]);

        $this->reset(['name', 'modality_id', 'description', 'url']);
        $this->session = Session::find($this->session->id);
    }

    public function update()
    {
        $this->validate();

        $this->activity->save();
        $this->activity = new Activity();
        $this->session = Session::find($this->session->id);
    }

    public function cancel()
    {
        $this->activity = new Activity();
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        $this->session = Session::find($this->session->id);
    }
}
