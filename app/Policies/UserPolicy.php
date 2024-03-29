<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function manageMail(User $user)
    {
        return true;
    }

}
