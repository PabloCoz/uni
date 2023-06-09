<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workshop;

class WorkshopPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Workshop $workshop)
    {
        return $workshop->students->contains($user->id);
    }

    public function published(?User $user, Workshop $workshop)
    {
        if ($workshop->status == 2) {
            return true;
        }else{
            return false;
        }
    }

}
