<?php

namespace App\Traits\User;

use App\Models\Permission;
use App\Models\Role;
use App\Models\UserToPermission;
use App\Models\UserToRole;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait toRoles
{
    ### Методы
    ##################################################
    public function hasRole(string $role)
    {
        return $this->roles->pluck('code')->contains($role);
    }

    public function hasPermission(string $permission)
    {
        return $this->getAllPermissions()->pluck('code')->contains($permission);
    }

    public function addRole(string|Role $role)
    {
        if ($role instanceof Role)
            $this->roles()->attach($role->id);
        else
            $this->roles()->attach(Role::byCode($role)->id);

        return $this;
    }

    public function addPermission(string|Permission $permission)
    {
        if ($permission instanceof Permission)
            $this->roles()->attach($permission->id);
        else
            $this->permissions()->attach(Permission::byCode($permission)->id);

        return $this;
    }

    public function getAllPermissions(): Collection
    {
        $straight_permissions = $this->permissions;
        $role_permissions = $this->roles->map(fn($role) => $role->permissions)->collapse();

        return $straight_permissions->merge($role_permissions);
    }

    ### Связи
    ##################################################
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, UserToRole::getTableName(), 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, UserToPermission::getTableName(), 'user_id', 'permission_id');
    }
}
