<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPermission::create(['code' => 'bank_contract-viewAny',      'name' => 'Просмотр всех записей (контракт с банком)']);
        UserPermission::create(['code' => 'bank_contract-view',         'name' => 'Просмотр записи (контракт с банком)']);
        UserPermission::create(['code' => 'bank_contract-create',       'name' => 'Создание записи (контракт с банком)']);
        UserPermission::create(['code' => 'bank_contract-update',       'name' => 'Обновление записи (контракт с банком)']);
        UserPermission::create(['code' => 'bank_contract-delete',       'name' => 'Удаление записи (контракт с банком)']);
    }
}
