<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'perusahaan' => 'Admin Company',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create a regular user
        User::create([
            'nama' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'user',
            'perusahaan' => 'User Company',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
