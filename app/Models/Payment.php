<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    ### Настройки
    ##################################################
    //

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function law(): BelongsTo
    {
        return $this->belongsTo(Law::class, 'law_id')->withTrashed();
    }
}
