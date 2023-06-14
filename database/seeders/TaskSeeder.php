<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 1000; $i++) {
	        Task::insert([
	        	'title'=>$faker->sentence(),
	        	'description'=>$faker->text(),
	        	'status'=>$faker->boolean
	        ]);
        }
    }
}
