<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'firstname' => 'kman',
            'lastname' => 'ma',
            'gender' => 'male',
            'phone' => '0781110013',
            'email' => 'admnaxnn@gmail.com',
            'dob' => '20/12/2000',
            'role_id' => '1',
            'username' => 'hdainx028',
            'password' => bcrypt('password123@'),
            'image' => 'user.png',
        ]);
    }
}
