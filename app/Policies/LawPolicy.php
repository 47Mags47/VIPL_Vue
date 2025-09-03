<?php

namespace App\Policies;

use App\Models\Law;
use App\Models\User;

class LawPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('law:viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Law $law): bool
    {
        return $user->hasPermission('law:view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('law:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Law $law): bool
    {
        return $user->hasPermission('law:update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Law $law): bool
    {
        return $user->hasPermission('law:delete');
    }
}
