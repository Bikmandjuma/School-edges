<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\price_range;

class RangePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $min=0;
        $max=200;

        $period_id=1;

        $data=[
            [
                'period_fk_id' => $period_id,
                'min_student' => $min,
                'max_student' => $max,
                'prices' => "100,000" ,
            ],[
                'period_fk_id' => $period_id,
                'min_student' => $max+1,
                'max_student' => $max+100,
                'prices' => "200,000",
            ],[
                'period_fk_id' => $period_id,
                'min_student' => $max+101,
                'max_student' => $max+200,
                'prices' => "300,000",

            ],[
                'period_fk_id' => $period_id,
                'min_student' => $max+201,
                'max_student' => $max+300,
                'prices' => "400,000",

            ],[
                'period_fk_id' => $period_id,
                'min_student' => $max+301,
                'max_student' => $max+400,
                'prices' => "500,000",

            ],[
                'period_fk_id' => $period_id,
                'min_student' => $max+401,
                'max_student' => $max+500,
                'prices' => "600,000",

            ],[
                'period_fk_id' => $period_id,
                'min_student' => $max+501,
                'max_student' => $max+600,
                'prices' => "700,000",

            ]
        ];

        price_range::insert($data);

    }

}
