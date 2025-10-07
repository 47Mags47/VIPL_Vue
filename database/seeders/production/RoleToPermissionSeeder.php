<?php

namespace Database\Seeders\production;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleToPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleToPermissionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::all()->each(function ($permission){
            RoleToPermission::create(['role_id' => Role::byCode('root')->id, 'permission_id' => $permission->id]);
        });

        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('division:viewAny')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('division:view')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('division:create')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('division:update')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('division:delete')->id]);

        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('user:viewAny')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('user:create')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('user:create:admin')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('user:create:moder')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('user:create:division')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('user:create:user')->id]);



        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('writer:viewAny')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('writer:view')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('writer:create')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('writer:update')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('writer:delete')->id]);

        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank_contract:viewAny')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank_contract:view')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank_contract:create')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank_contract:update')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank_contract:delete')->id]);

        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank:viewAny')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank:view')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank:create')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank:update')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('bank:delete')->id]);



        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('law:viewAny')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('law:view')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('law:create')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('law:update')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('law:delete')->id]);

        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment:viewAny')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment:view')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment:create')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment:update')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment:delete')->id]);

        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment_event:viewAny')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment_event:view')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment_event:create')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment_event:update')->id]);
        RoleToPermission::create(['role_id' => Role::byCode('program administrator')->id, 'permission_id' => Permission::byCode('payment_event:delete')->id]);


    }
}
