<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $users = User::where('username', 'LIKE', '%' . $this->search . '%')
            ->whereHas('profile', function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $this->search . '%');
            })
            ->latest('id')
            ->paginate(8);
        return view('livewire.admin.users.user-index', compact('users'))->layout('layouts.admin');
    }
}
