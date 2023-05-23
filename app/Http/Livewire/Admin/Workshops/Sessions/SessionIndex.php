<?php

namespace App\Http\Livewire\Admin\Workshops\Sessions;

use App\Models\Session;
use App\Models\Workshop;
use Livewire\Component;

class SessionIndex extends Component
{
    public $workshop, $session, $name;

    protected $rules = [
        'session.name' => 'required',
    ];

    public function mount(Workshop $workshop)
    {
        $this->workshop = $workshop;
        $this->session = new Session();
    }

    public function render()
    {
        return view('livewire.admin.workshops.sessions.session-index');
    }

    public function edit(Session $session)
    {
        $this->session = $session;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        Session::create([
            'name' => $this->name,
            'workshop_id' => $this->workshop->id
        ]);

        $this->reset('name');

        $this->workshop = Workshop::find($this->workshop->id);
    }

    public function update()
    {
        $this->validate();
        $this->session->save();
        $this->session = new Session();

        $this->workshop = Workshop::find($this->workshop->id);
    }

    public function destroy(Session $session)
    {
        $session->delete();
        $this->workshop = Workshop::find($this->workshop->id);
    }
}
