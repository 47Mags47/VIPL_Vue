<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use App\Models\UserRole;
use App\Models\UserRoleUserPermission;
use Illuminate\Database\Seeder;

class UserRoleUserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRoleUserPermission::create([
            'user_role_id' => UserRole::byCode('admin')->id,
            'user_permission_id' => UserPermission::byCode('bank_contract-viewAny')->id
        ]);

        UserRoleUserPermission::create([
            'user_role_id' => UserRole::byCode('admin')->id,
            'user_permission_id' => UserPermission::byCode('bank_contract-view')->id
        ]);

        UserRoleUserPermission::create([
            'user_role_id' => UserRole::byCode('admin')->id,
            'user_permission_id' => UserPermission::byCode('bank_contract-create')->id
        ]);

        UserRoleUserPermission::create([
            'user_role_id' => UserRole::byCode('admin')->id,
            'user_permission_id' => UserPermission::byCode('bank_contract-update')->id
        ]);

        UserRoleUserPermission::create([
            'user_role_id' => UserRole::byCode('admin')->id,
            'user_permission_id' => UserPermission::byCode('bank_contract-delete')->id
        ]);
    }
}
