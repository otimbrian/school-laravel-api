<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Student::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i <10; $i++){
            Student::create(
                [
                    'first_name' => $faker->name(),
                    'last_name' => $faker->name(),
                    'class' => $faker->randomLetter(),
                    'age' => $faker->numberBetween(15, 100),
                    'active' => $faker->boolean(50)
                ]
            );
        }
    }
}
