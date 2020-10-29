<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Statuses;

class StatusPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Statuses $status)
    {
        return $user->id === $status->user_id;
    }
}
