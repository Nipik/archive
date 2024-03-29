<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    public function manageAll(User $user)
    {
        return $user->isAdmin() || $user->isSuperAdmin();
    }

    public function delete(User $currentUser, User $user)
    {
        return $currentUser->isAdmin() || $currentUser->isSuperAdmin();
    }
}
