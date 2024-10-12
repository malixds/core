<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
class ExecutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $index) {
            User::create([
                'title'=> $faker->title(),
                'description'=> $faker->text(),
                'user_id'=> rand(1,3),
                'subject_id'=> rand(1, 7),
                'price'=> 1000,
                'deadline' => $faker->date(),
            ]);
        }
    }
}
