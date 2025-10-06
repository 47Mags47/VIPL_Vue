<?php

namespace App\Traits;

use App\Models\UserPermission;
use App\Models\UserRole;
use App\Models\UserToUserPermission;
use App\Models\UserToUserRole;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Roles
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

    public function addRole(string|UserRole $role)
    {
        if ($role instanceof UserRole)
            $this->roles()->attach($role->id);
        else
            $this->roles()->attach(UserRole::byCode($role)->id);
    }

    public function addPermission(string|UserPermission $permission)
    {
        if ($permission instanceof UserPermission)
            $this->roles()->attach($permission->id);
        else
            $this->permissions()->attach(UserPermission::byCode($permission)->id);
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
        return $this->belongsToMany(UserRole::class, UserToUserRole::getTableName(), 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(UserPermission::class, UserToUserPermission::getTableName(), 'user_id', 'permission_id');
    }
}
