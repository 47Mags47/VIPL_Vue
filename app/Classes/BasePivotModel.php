<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Relations\Pivot;

abstract class BasePivotModel extends Pivot
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
