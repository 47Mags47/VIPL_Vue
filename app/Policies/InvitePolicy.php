<?php

namespace App\Policies;

use App\Models\User;

class InvitePolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('user:create');
    }
}
