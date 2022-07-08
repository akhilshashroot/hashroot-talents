<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $availability = $faker->randomElement(['full-time', 'part-time']);
        $skill_set = $faker->randomElement(['java','python']);

    	foreach (range(1,10000) as $index) {
            DB::table('stakefield_users')->insert([
                'name' => $faker->name($availability),
                'email' => $faker->email,
                'employee_id' => $faker->numerify('######'),
                'skill_set' => $skill_set,
                'experience' => $faker->randomDigit,
                'turnaround_time' => $faker->randomDigit,
                'availability' => $availability,
                'rate' =>$faker->randomDigit,


            ]);
        }
    }
}
