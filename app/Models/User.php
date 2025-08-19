<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
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
        HasFactory;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->user_status_id ?? UserStatus::byCode('active')->id;
            $model->user_role_id ?? UserRole::byCode('user')->id;
        });
    }

    ### Методы
    ##################################################
    public function hasPermission(string $permission): bool
    {
        return $this->permissions()->where('user_permission_id', UserPermission::byCode($permission)->id)->count() > 0;
    }

    ### Связи
    ##################################################
    public function status() : BelongsTo{
        return $this->belongsTo(UserStatus::class, 'user_status_id');
    }

    public function role() : BelongsTo{
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }

    public function permissions(): HasManyThrough
    {
        return $this->hasManyThrough(UserPermission::class, UserRoleUserPermission::class, 'user_role_id', 'id', 'user_role_id', 'user_permission_id');
    }
}
