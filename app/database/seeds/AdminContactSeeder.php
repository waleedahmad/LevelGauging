<?php

class AdminContactSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		
		DB::table('contacts')->delete();   

        DB::table('contacts')->insert([
            'tank_id'   	=>  '',
            'title'			=> 	'Emergency Services',
            'name'			=>	'Mr Nick Chan',
            'job_title'		=>	'Fire Officer',
            'company'		=>	'Creations',
            'telephone_1'	=>	'07888 736 625',
            'telephone_1'	=>	'02143 4343 432',
            'email'			=>	'nick@999.com',
            'permissions'	=>	'admin'
        ]);

        Eloquent::reguard();

	}

}
