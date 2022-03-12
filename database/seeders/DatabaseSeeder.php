<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserStatusesTableSeeder::class]);
        $this->call([RolesTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([CategoriesTableSeeder::class]);
        $this->call([ProductsTableSeeder::class]);
        $this->call([StatusesTableSeeder::class]);
        $this->call([PaymentsTableSeeder::class]);
    }
}