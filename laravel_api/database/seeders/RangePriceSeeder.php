<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RangePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $min=0;
        $max=200;
        
        price_range::insert([
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
}
