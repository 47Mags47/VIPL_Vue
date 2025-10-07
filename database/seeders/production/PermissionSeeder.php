<?php

namespace Database\Seeders\production;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['code' => 'division:viewAny',           'name' => 'Просмотр всех записей (подразделения)']);
        Permission::create(['code' => 'division:view',              'name' => 'Просмотр записи (подразделения)']);
        Permission::create(['code' => 'division:create',            'name' => 'Создание записи (подразделения)']);
        Permission::create(['code' => 'division:update',            'name' => 'Обновление записи (подразделения)']);
        Permission::create(['code' => 'division:delete',            'name' => 'Удаление записи (подразделения)']);

        Permission::create(['code' => 'user:viewAny',               'name' => 'Просмотр всех записей (пользователи)']);
        Permission::create(['code' => 'user:create',                'name' => 'Добавление записи (пользователи)']);
        Permission::create(['code' => 'user:create:admin',          'name' => 'Добавление записи (пользователи администраторы)']);
        Permission::create(['code' => 'user:create:moder',          'name' => 'Добавление записи (пользователи модераторы)']);
        Permission::create(['code' => 'user:create:division',       'name' => 'Добавление записи (пользователи администраторы подразделения)']);
        Permission::create(['code' => 'user:create:user',           'name' => 'Добавление записи (пользователи)']);



        Permission::create(['code' => 'writer:viewAny',             'name' => 'Просмотр всех записей (Писатели)']);
        Permission::create(['code' => 'writer:view',                'name' => 'Просмотр записи (Писатели)']);
        Permission::create(['code' => 'writer:create',              'name' => 'Создание записи (Писатели)']);
        Permission::create(['code' => 'writer:update',              'name' => 'Обновление записи (Писатели)']);
        Permission::create(['code' => 'writer:delete',              'name' => 'Удаление записи (Писатели)']);

        Permission::create(['code' => 'bank_contract:viewAny',      'name' => 'Просмотр всех записей (контракт с банком)']);
        Permission::create(['code' => 'bank_contract:view',         'name' => 'Просмотр записи  (контракт с банком)']);
        Permission::create(['code' => 'bank_contract:create',       'name' => 'Создание записи (контракт с банком)']);
        Permission::create(['code' => 'bank_contract:update',       'name' => 'Обновление записи (контракт с банком)']);
        Permission::create(['code' => 'bank_contract:delete',       'name' => 'Удаление записи (контракт с банком)']);

        Permission::create(['code' => 'bank:viewAny',               'name' => 'Просмотр всех записей (банки)']);
        Permission::create(['code' => 'bank:view',                  'name' => 'Просмотр записи  (банки)']);
        Permission::create(['code' => 'bank:create',                'name' => 'Создание записи (банки)']);
        Permission::create(['code' => 'bank:update',                'name' => 'Обновление записи (банки)']);
        Permission::create(['code' => 'bank:delete',                'name' => 'Удаление записи (банки)']);



        Permission::create(['code' => 'law:viewAny',                'name' => 'Просмотр всех записей (закон)']);
        Permission::create(['code' => 'law:view',                   'name' => 'Просмотр записи (закон)']);
        Permission::create(['code' => 'law:create',                 'name' => 'Создание записи (закон)']);
        Permission::create(['code' => 'law:update',                 'name' => 'Обновление записи (закон)']);
        Permission::create(['code' => 'law:delete',                 'name' => 'Удаление записи (закон)']);

        Permission::create(['code' => 'payment:viewAny',            'name' => 'Просмотр всех записей (выплаты)']);
        Permission::create(['code' => 'payment:view',               'name' => 'Просмотр записи (выплаты)']);
        Permission::create(['code' => 'payment:create',             'name' => 'Создание записи (выплаты)']);
        Permission::create(['code' => 'payment:update',             'name' => 'Обновление записи (выплаты)']);
        Permission::create(['code' => 'payment:delete',             'name' => 'Удаление записи (выплаты)']);

        Permission::create(['code' => 'payment_event:viewAny',      'name' => 'Просмотр всех записей (события выплат)']);
        Permission::create(['code' => 'payment_event:view',         'name' => 'Просмотр записи (события выплат)']);
        Permission::create(['code' => 'payment_event:create',       'name' => 'Создание записи (события выплат)']);
        Permission::create(['code' => 'payment_event:update',       'name' => 'Обновление записи (события выплат)']);
        Permission::create(['code' => 'payment_event:delete',       'name' => 'Удаление записи (события выплат)']);
    }
}
