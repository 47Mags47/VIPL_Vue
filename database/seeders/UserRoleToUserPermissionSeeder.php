<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use App\Models\UserRole;
use App\Models\UserRoleToUserPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleToUserPermissionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPermission::all()->each(function ($permission){
            UserRoleToUserPermission::create(['role_id' => UserRole::byCode('root')->id, 'permission_id' => $permission->id]);
        });

        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('division:viewAny')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('division:view')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('division:create')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('division:update')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('division:delete')->id]);

        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('user:viewAny')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('user:create')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('user:create:admin')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('user:create:moder')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('user:create:division')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('user:create:user')->id]);



        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('writer:viewAny')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('writer:view')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('writer:create')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('writer:update')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('writer:delete')->id]);

        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank_contract:viewAny')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank_contract:view')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank_contract:create')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank_contract:update')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank_contract:delete')->id]);

        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank:viewAny')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank:view')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank:create')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank:update')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('bank:delete')->id]);



        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('law:viewAny')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('law:view')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('law:create')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('law:update')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('law:delete')->id]);

        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment:viewAny')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment:view')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment:create')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment:update')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment:delete')->id]);

        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment_event:viewAny')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment_event:view')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment_event:create')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment_event:update')->id]);
        UserRoleToUserPermission::create(['role_id' => UserRole::byCode('program administrator')->id, 'permission_id' => UserPermission::byCode('payment_event:delete')->id]);


    }
}
