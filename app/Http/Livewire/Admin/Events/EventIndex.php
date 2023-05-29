<?php

namespace App\Http\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $events = Event::paginate(8);
        return view('livewire.admin.events.event-index', compact('events'));
    }
}
