<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends BaseModel
{
    /** @use HasFactory<\Database\Factories\DivisionFactory> */
    use HasFactory;

    ### Настройки
    ##################################################
    //

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'division_id');
    }
}
