<?php

use Illuminate\Database\Seeder;
use App\Models\Record;
class RecordsTableSeeder extends Seeder
{

    public function run()
    {
        Record::truncate();//清除原有数据
        $faker = Faker\Factory::create('zh_CN');
        {
            $record = new Record();
            $record->student_id = 1;
            $record->record_type= 0;
            $record->index= 1;
            $record->correct=1;
            $record->created_at=$faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
            $record->save();
        }
    }
}
