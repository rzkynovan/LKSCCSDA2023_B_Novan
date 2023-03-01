<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Rizky Novan Aditiya',
                'role' => 'admin',
                'email' => 'rizkynovan21@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('12345678')
            ],
            [
                'name' => 'Rizky Novan',
                'role' => 'user',
                'email' => 'rizkynovan@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'password' => \bcrypt('12345678')
            ]
        ]);
    }
}
