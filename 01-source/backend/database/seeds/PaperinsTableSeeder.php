<?php


use Illuminate\Database\Seeder;
use App\Models\Paperin;
class PaperinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // protected $table = 'paperins';
    // protected $fillable = ['paper_id','subject_id','subjectype_id','created_at','updated_at'];
    
    public function run()
    {
        Paperin::truncate();//清除原有数据
        $faker = Faker\Factory::create('zh_CN');
        {
            #????
            for($i=1;$i<=16;$i++){
                $paperin = new Paperin();
                $paperin->paper_id = 1;
                $paperin->subject_id= $i;
                $paperin->subjectype_id = 1;
                $paperin->created_at=$faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
                $paperin->save();
            };
            for($i=17;$i<=33;$i++){
                $paperin = new Paperin();
                $paperin->paper_id = 1;
                $paperin->subject_id= $i;
                $paperin->subjectype_id = 2;
                $paperin->created_at=$faker->dateTimeBetween($startDate = 'now', $endDate = 'now', $timezone = null);
                $paperin->save();
            };
        }
    }
}
