<?php

use Illuminate\Database\Seeder;
use App\Models\Analyse;
class AnalysesTableSeeder extends Seeder
{
    
    public function run()
    {
        Analyse::truncate();//清除原有数据
        $faker = Faker\Factory::create('zh_CN');
        {
            $analyse = new Analyse();
            $analyse->student_id = 1;
            $analyse->paper_id= 1;
            $analyse->time= $faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
            $analyse->created_at=$faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
            $analyse->save();
        }
    }
}
