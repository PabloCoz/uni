<?php

namespace App\Http\Livewire\Admin\Workshops;

use App\Models\Workshop;
use Livewire\Component;

class WorkshopIndex extends Component
{
    public $search;
    
    public function render()
    {
        $workshops = Workshop::where('title', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);
        return view('livewire.admin.workshops.workshop-index', compact('workshops'));
    }
}
