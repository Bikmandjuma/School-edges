<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\period_price;

class priceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limit=3000;
        period_price::insert([
            [
                'period' => 'Monthly',
                'student_limit' => $limit,
            ],[
                'period' => 'Termly',
                'student_limit' => $limit,
            ],[
                'period' => 'Annually',
                'student_limit' => $limit,
            ]
        ]);
    }
}
