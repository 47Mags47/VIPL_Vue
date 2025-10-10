<?php

namespace App\Traits\User;

use App\Models\Division;
use App\Models\DivisionRole;
use App\Models\UserToDivision;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait toDivisions
{
    ### Методы
    ##################################################
    public function hasDivision(string|Division $division)
    {
        if ($division instanceof Division)
            return $this->divisions->pluck('id')->contains($division->id);

        if (is_string($division))
            return $this->divisions->pluck('id')->contains($division);
    }

    public function addDivision(string|Division $division, null|string|DivisionRole $role = 'worker')
    {
        $division = $division instanceof Division
            ? $division
            : Division::whereKey($division)->first();

        $role = $role instanceof DivisionRole
            ? $role
            : DivisionRole::byCode($role);

        $this->divisions()->attach($division->id, ['role_id' => $role->id]);

        return $this;
    }

    ### Связи
    ##################################################
    public function divisions(): BelongsToMany
    {
        return $this
            ->belongsToMany(Division::class, UserToDivision::class, 'user_id', 'division_id')
            ->withPivot('role_id');
    }
}
