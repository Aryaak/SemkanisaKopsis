<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'role_id' => 1,
            'status_id' => 2,
            'email' => 'admin@semkanisakopsis.com',
            'email_verified_at' => now(),
            'balance' => 2000,
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Arya Rizky',
            'role_id' => 2,
            'status_id' => 2,
            'email' => 'aryarizky2303@gmail.com',
            'email_verified_at' => now(),
            'balance' => 2000,
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}