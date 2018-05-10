<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recruit;

class RecruitPolicy extends Policy
{

    public function update(User $user, Recruit $recruit)
    {
        // return $recruit->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Recruit $recruit)
    {
        return true;
    }
}
