<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Group;

class GroupPolicy extends Policy
{

    public function update(User $user, Group $group)
    {
        // return $group->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Group $group)
    {
        return true;
    }
}
