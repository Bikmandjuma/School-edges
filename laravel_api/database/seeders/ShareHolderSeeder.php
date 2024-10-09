<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShareHolder;

class ShareHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShareHolder::insert([
            [
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'gender' => 'male',
                'phone' => '0780001100',
                'email' => 'admins@gmail.com',
                'dob' => '20/12/2000',
                'username' => 'admin111',
                'password' => bcrypt('bugarama'),
                'image' => 'user.png',
                'role' => 'Admin',
            ],[
                'firstname' => 'Adminf',
                'lastname' => 'Adminl',
                'gender' => 'male',
                'phone' => '0780021100',
                'email' => 'adminx@gmail.com',
                'dob' => '20/12/2000',
                'username' => 'admin222',
                'password' => bcrypt('bugarama'),
                'image' => 'user.png',
                'role' => 'ShareHolder',
            ],[
                'firstname' => 'Adminx',
                'lastname' => 'Admibn',
                'gender' => 'male',
                'phone' => '0780001160',
                'email' => 'adminw@gmail.com',
                'dob' => '20/12/2000',
                'username' => 'admin333',
                'password' => bcrypt('bugarama'),
                'image' => 'user.png',
                'role' => 'ShareHolder',
            ]
        ]);
    }
}
