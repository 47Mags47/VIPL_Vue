<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Writer;
use Illuminate\Auth\Access\Response;

class WriterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('writer:viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Writer $writer): bool
    {
        return $user->hasPermission('writer:view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('writer:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Writer $writer): bool
    {
        return $user->hasPermission('writer:update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Writer $writer): bool
    {
        return $user->hasPermission('writer:delete');
    }
}
