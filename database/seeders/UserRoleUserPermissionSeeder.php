<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use App\Models\UserRole;
use App\Models\UserRoleUserPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleUserPermissionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('division:viewAny')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('division:view')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('division:create')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('division:update')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('division:delete')->id]);

        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('user:viewAny')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('user:create')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('user:create:admin')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('user:create:moder')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('user:create:division')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('user:create:user')->id]);



        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('writer:viewAny')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('writer:view')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('writer:create')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('writer:update')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('writer:delete')->id]);

        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank_contract:viewAny')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank_contract:view')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank_contract:create')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank_contract:update')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank_contract:delete')->id]);

        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank:viewAny')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank:view')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank:create')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank:update')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('bank:delete')->id]);



        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('law:viewAny')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('law:view')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('law:create')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('law:update')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('law:delete')->id]);

        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('payment:viewAny')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('payment:view')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('payment:create')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('payment:update')->id]);
        UserRoleUserPermission::create(['role_id' => UserRole::byCode('admin')->id, 'permission_id' => UserPermission::byCode('payment:delete')->id]);




    }
}
