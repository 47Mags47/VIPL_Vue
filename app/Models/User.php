<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\User\toDivisions;
use App\Traits\User\toRoles;
use App\Traits\User\toStatus;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    ### Настройки
    ##################################################
    use
        Authenticatable,
        Authorizable,
        CanResetPassword,
        MustVerifyEmail,
        HasFactory,
        SoftDeletes,
        toRoles,
        toDivisions,
        toStatus;

    protected $hidden = [
        'password',
        'password_expired',
        'remember_token',
        'email_verified_at'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'password_expired' => 'boolean',
            'email_verified_at' => 'datetime',
        ];
    }

    ### Методы
    ##################################################

    ### Связи
    ##################################################
    public function status(): BelongsTo
    {
        return $this->belongsTo(UserStatus::class, 'status_id');
    }
}
