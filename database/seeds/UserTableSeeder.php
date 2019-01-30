<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
				'name'		=> 'Автор невідомий',
				'email' 	=> 'author_unknown@g.g',
				'password'  => bcrypt(str_random(16)),
			],
        	[
        		'name' 		=> 'Автор',
        		'email' 	=> 'a@a.a',
        		'password'  => bcrypt(123123),
			]
		];
        DB::table('users')->insert($data);
    }
}
