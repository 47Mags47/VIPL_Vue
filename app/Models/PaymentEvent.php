<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentEvent extends BaseModel
{
    /** @use HasFactory<\Database\Factories\PaymentEventFactory> */
    use HasFactory;

    ### Настройки
    ##################################################
    //

    ### Методы
    ##################################################
    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }

    ### Связи
    ##################################################
    //
}
