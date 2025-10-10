<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Mail\InviteMail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;

class Invite extends BaseModel
{
    /** @use HasFactory<\Database\Factories\InviteFactory> */
    use HasFactory;

    ### Настройки
    ##################################################

    ### Ограничения
    ##################################################
    public function scopeWhereToken(Builder $builder, string $token){
        return $builder->where('token', $token);
    }

    ### Методы
    ##################################################

    ### Связи
    ##################################################
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(DivisionRole::class, 'role_id');
    }
}
