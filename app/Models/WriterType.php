<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WriterType extends BaseModel
{
    use HasCode;

    ### Настройки
    ##################################################
    public $timestamps = false;

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function writers(): HasMany
    {
        return $this->hasMany(Writer::class, 'type_id');
    }
}
