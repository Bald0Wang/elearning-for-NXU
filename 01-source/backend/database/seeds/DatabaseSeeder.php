<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AnalysesTableSeeder::class);
        $this->call(PaperinsTableSeeder::class);
        $this->call(PapersTableSeeder::class);
        $this->call(RecordsTableSeeder::class);
        $this->call(ScoresTableSeeder::class);
        $this->call(SubjectTypesTableSeeder::class);
        $this->call(AnalysesTableSeeder::class);

    }
}
