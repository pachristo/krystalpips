<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'adnub@krystalpips.com',
                'password' => Hash::make('123456'),
                'phone' => '1234567890',
                'type' => 'admin', // Type can be 'admin', 'user', etc.
                'status' => 'active', // Status can be 'active', 'inactive', etc.
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('123456'),
                'phone' => '0987654321',
                'type' => 'admin',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
