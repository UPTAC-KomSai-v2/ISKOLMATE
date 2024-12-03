<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
/* use Faker\Factory as Faker; */

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::factory()->count(50)->create();
       /* instead of seeding user directly we use UserFactory for ease of creating relationships with other factories. For example, we can create a new user for each dummy post easily with factories. Previous code involved importing Faker, making a for loop and inserting using the DB facade, we can use User::factory(number)->create()  */

       /* $faker = Faker::create("App/User"); */
       /* $limit = 10; */
       /* for($i=0;$i<$limit;$i++) { */
       /*     \DB::table('users')->insert([ */
       /*          'uid' => $faker->unique()->randomNumber(5, false), */
       /*          'name'=> $faker->name(), */
       /*          'program' => $faker->word(), */
       /*          'password' => $faker->sha1(), */
       /*          'availability' => $faker->numberBetween(0,1), */
       /*          'role' => $faker->word() */
       /*     ]); */
       /* } */
    }
}
