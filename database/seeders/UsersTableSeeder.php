<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Faker::create("App/User");

       \DB::table('users')->insert([
            'uid' => $faker->unique()->randomNumber(5, false),
            'name'=> $faker->name(),
            'program' => $faker->word(),
            'password' => $faker->sha1(),
            'availability' => $faker->numberBetween(0,1),
            'role' => $faker->word()
       ]);
    }
}
