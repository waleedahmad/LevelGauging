<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();

        DB::table('contacts')->insert([
            'tank_id'   	=>  '0',
            'title'			=> 	'Emergency Services',
            'name'			=>	'Mr Nick Chan',
            'job_title'		=>	'Fire Officer',
            'company'		=>	'Creations',
            'telephone_1'	=>	'07888 736 625',
            'telephone_1'	=>	'02143 4343 432',
            'email'			=>	'nick@999.com',
            'permissions'	=>	'admin'
        ]);
    }
}
