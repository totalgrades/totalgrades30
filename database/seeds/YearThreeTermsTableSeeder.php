<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class YearThreeTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school_year_three = \DB::table('school_years')->where('id', '=', 3)->first();

        DB::table('terms')->insert(array(
             array(
                    'school_year_id'=>$school_year_three->id, 
                    'term'=>'1st Term',
                    'start_date'=>Carbon::create('2024', '09', '11'),
                    'end_date'=>Carbon::create('2024', '12', '15'),
                    'show_until'=>Carbon::create('2025', '01', '07')
                 ),

             array(
                    'school_year_id'=>$school_year_three->id, 
                    'term'=>'2nd Term',
                    'start_date'=>Carbon::create('2025', '01', '08'),
                    'end_date'=>Carbon::create('2025', '04', '06'),
                    'show_until'=>Carbon::create('2025', '04', '15')
                  ),

             array(
                    'school_year_id'=>$school_year_three->id, 
                    'term'=>'3rd Term',
                    'start_date'=>Carbon::create('2025', '04', '16'),
                    'end_date'=>Carbon::create('2025', '07', '20'),
                    'show_until'=>Carbon::create('2025', '09', '10')
                  ),

             

          ));
    }
}
