<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bank extends BaseModel
{
    /** @use HasFactory<\Database\Factories\BankFactory> */
    use HasFactory;

    ### Настройки
    ##################################################
    //

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function contract(): BelongsTo
    {
        return $this->belongsTo(BankContract::class, 'contract_id');
    }
}
