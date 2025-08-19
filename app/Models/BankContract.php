<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankContract extends BaseModel
{
    use HasFactory;

    ### Настройки
    ##################################################
    protected function casts(): array
    {
        return [
            'signed_at' => 'datetime',
        ];
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    //
}
