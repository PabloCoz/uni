<?php

namespace App\Http\Livewire\Workshops;

use App\Models\Workshop;
use Livewire\Component;
use Livewire\WithPagination;

class WorkshopIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $workshops = Workshop::where('status', Workshop::PUBLICADO)->latest('id')->paginate(8);
        return view('livewire.workshops.workshop-index', compact('workshops'));
    }
}
