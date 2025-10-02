<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPermission::create(['code' => 'division:viewAny',           'name' => 'Просмотр всех записей (подразделения)']);
        UserPermission::create(['code' => 'division:view',              'name' => 'Просмотр записи (подразделения)']);
        UserPermission::create(['code' => 'division:create',            'name' => 'Создание записи (подразделения)']);
        UserPermission::create(['code' => 'division:update',            'name' => 'Обновление записи (подразделения)']);
        UserPermission::create(['code' => 'division:delete',            'name' => 'Удаление записи (подразделения)']);

        UserPermission::create(['code' => 'user:viewAny',               'name' => 'Просмотр всех записей (пользователи)']);
        UserPermission::create(['code' => 'user:create',                'name' => 'Добавление записи (пользователи)']);
        UserPermission::create(['code' => 'user:create:admin',          'name' => 'Добавление записи (пользователи администраторы)']);
        UserPermission::create(['code' => 'user:create:moder',          'name' => 'Добавление записи (пользователи модераторы)']);
        UserPermission::create(['code' => 'user:create:division',       'name' => 'Добавление записи (пользователи администраторы подразделения)']);
        UserPermission::create(['code' => 'user:create:user',           'name' => 'Добавление записи (пользователи)']);



        UserPermission::create(['code' => 'writer:viewAny',             'name' => 'Просмотр всех записей (Писатели)']);
        UserPermission::create(['code' => 'writer:view',                'name' => 'Просмотр записи (Писатели)']);
        UserPermission::create(['code' => 'writer:create',              'name' => 'Создание записи (Писатели)']);
        UserPermission::create(['code' => 'writer:update',              'name' => 'Обновление записи (Писатели)']);
        UserPermission::create(['code' => 'writer:delete',              'name' => 'Удаление записи (Писатели)']);

        UserPermission::create(['code' => 'bank_contract:viewAny',      'name' => 'Просмотр всех записей (контракт с банком)']);
        UserPermission::create(['code' => 'bank_contract:view',         'name' => 'Просмотр записи  (контракт с банком)']);
        UserPermission::create(['code' => 'bank_contract:create',       'name' => 'Создание записи (контракт с банком)']);
        UserPermission::create(['code' => 'bank_contract:update',       'name' => 'Обновление записи (контракт с банком)']);
        UserPermission::create(['code' => 'bank_contract:delete',       'name' => 'Удаление записи (контракт с банком)']);

        UserPermission::create(['code' => 'bank:viewAny',               'name' => 'Просмотр всех записей (банки)']);
        UserPermission::create(['code' => 'bank:view',                  'name' => 'Просмотр записи  (банки)']);
        UserPermission::create(['code' => 'bank:create',                'name' => 'Создание записи (банки)']);
        UserPermission::create(['code' => 'bank:update',                'name' => 'Обновление записи (банки)']);
        UserPermission::create(['code' => 'bank:delete',                'name' => 'Удаление записи (банки)']);



        UserPermission::create(['code' => 'law:viewAny',                'name' => 'Просмотр всех записей (закон)']);
        UserPermission::create(['code' => 'law:view',                   'name' => 'Просмотр записи (закон)']);
        UserPermission::create(['code' => 'law:create',                 'name' => 'Создание записи (закон)']);
        UserPermission::create(['code' => 'law:update',                 'name' => 'Обновление записи (закон)']);
        UserPermission::create(['code' => 'law:delete',                 'name' => 'Удаление записи (закон)']);

        UserPermission::create(['code' => 'payment:viewAny',            'name' => 'Просмотр всех записей (выплаты)']);
        UserPermission::create(['code' => 'payment:view',               'name' => 'Просмотр записи (выплаты)']);
        UserPermission::create(['code' => 'payment:create',             'name' => 'Создание записи (выплаты)']);
        UserPermission::create(['code' => 'payment:update',             'name' => 'Обновление записи (выплаты)']);
        UserPermission::create(['code' => 'payment:delete',             'name' => 'Удаление записи (выплаты)']);

        UserPermission::create(['code' => 'payment_event:viewAny',      'name' => 'Просмотр всех записей (события выплат)']);
        UserPermission::create(['code' => 'payment_event:view',         'name' => 'Просмотр записи (события выплат)']);
        UserPermission::create(['code' => 'payment_event:create',       'name' => 'Создание записи (события выплат)']);
        UserPermission::create(['code' => 'payment_event:update',       'name' => 'Обновление записи (события выплат)']);
        UserPermission::create(['code' => 'payment_event:delete',       'name' => 'Удаление записи (события выплат)']);
    }
}
