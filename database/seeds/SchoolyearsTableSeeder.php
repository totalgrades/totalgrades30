<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SchoolyearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('school_years')->insert(array(
               array(
                         'school_year'=>'2022/2023', 
                         'start_date'=>Carbon::create('2022', '09', '12'),
                         'end_date'=>Carbon::create('2023', '07', '22'),
                         'show_until'=>Carbon::create('2023', '09', '11')
                ),
               array(
                         'school_year'=>'2023/2024', 
                         'start_date'=>Carbon::create('2023', '09', '12'),
                         'end_date'=>Carbon::create('2024', '07', '22'),
                         'show_until'=>Carbon::create('2024', '09', '11')
               ),
               array(
                         'school_year'=>'2024/2025', 
                         'start_date'=>Carbon::create('2024', '09', '12'),
                         'end_date'=>Carbon::create('2025', '07', '22'),
                         'show_until'=>Carbon::create('2025', '09', '11')
               ),
             
          ));
    }
}
