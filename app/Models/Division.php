<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Http\Resources\DivisionUserResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends BaseModel
{
    /** @use HasFactory<\Database\Factories\DivisionFactory> */
    use HasFactory;

    ### Настройки
    ##################################################
    //

    ### Ограничения
    ##################################################
    //

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function users(): BelongsToMany
    {
        return $this
            ->belongsToMany(DivisionUser::class, UserToDivision::class, 'division_id', 'user_id')
            ->withPivot('role_id');
    }

    public function admins(): BelongsToMany
    {
        return $this
            ->users()
            ->wherePivot('role_id', DivisionRole::byCode('admin')->id);
    }

    public function workers(): BelongsToMany
    {
        return $this
            ->users()
            ->wherePivot('role_id', DivisionRole::byCode('worker')->id);
    }

    public function invites(): HasMany
    {
        return $this->hasMany(Invite::class, 'division_id');
    }
}
