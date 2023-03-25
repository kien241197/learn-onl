<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'user_name' => 'admin',
            'phone' => '0987654321',
            'email' => 'admin@admin.com',
            'level' => '999',
            'password' => bcrypt('admin'),
        ]);
    }
}
