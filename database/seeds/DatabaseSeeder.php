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
        $datetime = date('Y-m-d H:i:s');
    

        DB::table('albums')->insert([
            'name' => 'prints',
            'default_year_name' => '2019',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('albums')->insert([
            'name' => 'drawings',
            'default_year_name' => '2019',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('albums')->insert([
            'name' => 'sculpture',
            'default_year_name' => '2019',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('years')->insert([
            'name' => '2017',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('years')->insert([
            'name' => '2018',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);

        DB::table('years')->insert([
            'name' => '2019',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ]);
    }
    
}
