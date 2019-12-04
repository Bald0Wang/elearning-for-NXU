<?php

use Illuminate\Database\Seeder;
use App\Models\Score;
class ScoresTableSeeder extends Seeder
{
    
    public function run()
    {
        Score::truncate();//清除原有数据
        $faker = Faker\Factory::create('zh_CN');
        {
            $score = new Score();
            $score->student_id = 1;
            $score->paper_id= 1;
            $score->score= 80;
            $score->created_at=$faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
            $score->save();
        }
    }
}
