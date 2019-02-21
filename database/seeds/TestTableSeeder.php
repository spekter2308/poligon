<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role = factory(App\TestRoles::class, 'admin')->create();
        factory(App\Test::class, 'admin', 5)->create()->each(function ($test) use ($role) {
        	$role->tests()->attach($test);
        	$test->test_additional()->save(factory(App\TestAdditional::class, 'admin')->make()) ;

		});
    }
}
