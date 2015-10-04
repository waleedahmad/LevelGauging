<?php

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		
		DB::table('users')->delete();   

        DB::table('users')->insert([
            'email'     =>  'abc@gmail.com',
            'password'  =>  Hash::make('binarystar'),
            'type'      =>  'admin',
            'approved'  =>  1,
            'enote'     =>  ''
        ]);
        
        for($i = 0; $i<=100; $i++){
            DB::table('users')->insert([
                'email'     =>  str_random(10).'@gmail.com',
                'password'  =>  Hash::make('binarystar'),
                'type'      =>  'user',
                'approved'  =>  0,
                'enote'     =>  ''
            ]);
        }

        Eloquent::reguard();

	}

}
