<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use ReflectionClass;

abstract class BaseModel extends Model
{
    ### Настройки
    ##################################################
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (in_array('auth', request()->route()->middleware()) and user()->cannot('create', $model::class)) // Проверка авторизации пользователя для этого действия
                return abort(403);
        });

        self::updating(function ($model) {
            if (in_array('auth', request()->route()->middleware()) and user()->cannot('update', $model)) // Проверка авторизации пользователя для этого действия
                return abort(403);
        });

        self::deleting(function ($model) {
            if (in_array('auth', request()->route()->middleware()) and user()->cannot('delete', $model)) // Проверка авторизации пользователя для этого действия
                return abort(403);
        });
    }

    ### Методы
    ##################################################
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public static function getRandomId()
    {
        return static::all()->random()->id;
    }

    public static function getTableColumns()
    {
        return (new static)->getConnection()->getSchemaBuilder()->getColumnListing(static::getTableName());
    }

    ### Поиск и фильтрация
    ##################################################
    public $searched = ['name', 'short_name', 'long_name', 'number', 'code'];

    public static function filter(): Builder
    {
        $modelName = new ReflectionClass(static::class)->getShortName();
        $filterName = 'App\\Filters\\' . $modelName . 'Filter';

        return class_exists($filterName)
            ? new $filterName()->apply(static::query())
            : new BaseFilter()->apply(static::query());
    }
}
