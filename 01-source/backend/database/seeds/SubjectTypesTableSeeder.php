<?php

use Illuminate\Database\Seeder;
use App\Models\SubjectType;
class SubjectTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    #seed
   ## php artisan db:seed --class=PapersTableSeeder   
//    protected $table = 'subject_types';
//    protected $fillable = ['subtype','anstype','created_at','updated_at'];

    public function run()
    {
        SubjectType::truncate();//清除原有数据
        $faker = Faker\Factory::create('zh_CN');
        {
            $subtype = new SubjectType();
            $subtype->subtype = 1;
            $subtype->anstype= 1;
            // $subtype->score= 80;
            $subtype->created_at=$faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
            $subtype->save();
        }
        {
            $subtype = new SubjectType();
            $subtype->subtype = 1;
            $subtype->anstype= 2;
            // $subtype->score= 80;
            $subtype->created_at=$faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
            $subtype->save();
        }
    }
}

