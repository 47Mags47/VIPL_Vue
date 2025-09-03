<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Mail\InviteMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;

class Invite extends BaseModel
{
    /** @use HasFactory<\Database\Factories\InviteFactory> */
    use HasFactory;

    ### Настройки
    ##################################################
    //
    public static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            Mail::to($model->email)->queue(new InviteMail($model));
        });
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }
}
