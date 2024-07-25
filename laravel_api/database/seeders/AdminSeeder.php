<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        admin::create([
            'firstname' => 'Admin_fname',
            'lastname' => 'Admin_lname',
            'gender' => 'male',
            'phone' => '07800000000',
            'email' => 'admin@gmail.com',
            'dob' => '20/12/2000',
            'username' => 'admin123',
            'password' => bcrypt('password123@'),
            'image' => 'user.png',
        ]);
    }
}
