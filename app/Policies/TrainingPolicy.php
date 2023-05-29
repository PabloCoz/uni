<?php

namespace App\Policies;

use App\Models\Training;
use App\Models\User;

class TrainingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Training $training)
    {
        return $training->users->contains($user->id);
    }

    public function published(?User $user, Training $training)
    {
        if ($training->status == 2) {
            return true;
        }else{
            return false;
        }
    }

    public function dictated(User $user, Training $training)
    {
        if ($training->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }
}
