<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Builder;

class UserRole extends BaseModel
{
    use HasCode;

    ### Настройки
    ##################################################
    public $timestamps = false;

    ### Ограничения
    ##################################################
    public function scopeCanCreate(Builder $builder){
        return $builder->where(function($query){
            $query->whereKey(0);

            if(user()->hasPermission('user:create:admin'))
                $query->orWhere('code', 'admin');

            if(user()->hasPermission('user:create:moder'))
                $query->orWhere('code', 'moder');

            if(user()->hasPermission('user:create:division'))
                $query->orWhere('code', 'division');

            if(user()->hasPermission('user:create:user'))
                $query->orWhere('code', 'user');
        });
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    //
}
