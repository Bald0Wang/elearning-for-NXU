<?php

use Illuminate\Database\Seeder;
use App\Models\Paper;
class PapersTableSeeder extends Seeder
{
    
    public function run()
    {
        Paper::truncate();//清除原有数据
        $faker = Faker\Factory::create('zh_CN');
        {
            $paper = new Paper();
            $paper->introdcution = '政治试卷';
            $paper->usingfor='测验';
            $paper->hardtype='9';
            $paper->subjectype_id='1';
            $paper->sum0='10';
            $paper->sum1='10';
            $paper->sum2='0';
            $paper->scorealgorithm='1';
            $paper->created_at=$faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
            $paper->save();
        }
    }
    
}
