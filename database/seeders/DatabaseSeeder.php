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
        $this->call(DivisionSeeder::class);
        $this->call(UserPermissionSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserRoleUserPermissionSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(WriterTypeSeeder::class);
        $this->call(WriterSeeder::class);

        $this->call(BankContractSeeder::class);
        $this->call(BankSeeder::class);

        $this->call(LawSeeder::class);
        $this->call(PaymentSeeder::class);

        $this->call(PaymentEventStatusSeeder::class);
        $this->call(PaymentEventSeeder::class);
    }
}
