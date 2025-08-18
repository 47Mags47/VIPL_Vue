<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserStatusSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserPermissionSeeder::class);
        $this->call(UserRoleUserPermissionSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(BankContractSeeder::class);
    }
}
