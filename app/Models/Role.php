<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends BaseModel
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
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, RoleToPermission::getTableName(), 'role_id', 'permission_id');
    }
}
