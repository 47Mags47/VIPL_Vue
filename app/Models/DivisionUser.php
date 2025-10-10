<?php

namespace App\Models;

use App\Classes\BaseModel;
use Illuminate\Database\Eloquent\Builder;

class DivisionUser extends User
{
    ### Настройки
    ##################################################
    protected $table = 'users';

    ### Ограничения
    ##################################################

    ### Методы
    ##################################################
    public function toDivision(int|Division $division)
    {
        $division = $division instanceof Division
            ? $division
            : Division::whereKey($division)->first();

        return $division
            ->users()
            ->wherePivot('user_id', $this->id)
            ->first();
    }

    public function setDivisionRole(int|Division $division, string|int|DivisionRole $role)
    {
        $division = $division instanceof Division
            ? $division
            : Division::whereKey($division)->first();

        if ($role instanceof DivisionRole)
            $role = $role;
        elseif (is_string($role))
            $role = DivisionRole::byCode($role);
        else
            $role = DivisionRole::whereKey($role)->first();

        $this->toDivision($division)->pivot->update(['role_id' => $role->id]);

        return $this;
    }

    ### Связи
    ##################################################
    //
}
