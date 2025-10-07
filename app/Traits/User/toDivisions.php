<?php

namespace App\Traits\User;

use App\Models\Division;
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

    public function addDivision(string|Division $division)
    {
        if ($division instanceof Division and !$this->hasDivision($division))
            $this->divisions()->attach($division->id);

        if (is_string($division) and !$this->hasDivision($division))
            $this->divisions()->attach(Division::whereKey($division)->first()->id);

        return $this;
    }

    ### Связи
    ##################################################
    public function divisions(): BelongsToMany
    {
        return $this->belongsToMany(Division::class, UserToDivision::getTableName(), 'user_id', 'division_id');
    }
}
