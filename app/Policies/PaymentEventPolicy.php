<?php

namespace App\Policies;

use App\Models\PaymentEvent;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PaymentEventPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('payment_event:viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PaymentEvent $paymentEvent): bool
    {
        return $user->hasPermission('payment_event:view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('payment_event:create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PaymentEvent $paymentEvent): bool
    {
        return $user->hasPermission('payment_event:update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PaymentEvent $paymentEvent): bool
    {
        return $user->hasPermission('payment_event:delete');
    }
}
