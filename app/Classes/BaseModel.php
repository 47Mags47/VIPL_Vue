<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    ### Настройки
    ##################################################
    protected $guarded = [];

    ### Методы
    ##################################################
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
