<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$registration_code_staffer = DB::table('staffers')->where('registration_code', '=', 'SA45RT71987' )->first();
    	
    	
        DB::table('admins')->insert([
            'is_super_admin' => 1,
            'name' => 'Nnamdi Okeke',
            'registration_code' => $registration_code_staffer->registration_code,
            'email' => 'nahorr@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
