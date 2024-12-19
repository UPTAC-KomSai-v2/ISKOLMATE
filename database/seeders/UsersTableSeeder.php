<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Announcement;
use App\Models\Activity;
use App\Models\Availability;

/* use Faker\Factory as Faker; */

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::factory()->count(50)
                        ->has(
                            Announcement::factory()->count(3)
                            ->state(function(array $attributes, User $user) {
                                if ($user->role == 'Student') {
                                    return [
                                        'title' => fake()->randomElement(['MISSING: Payong na blue ha DMCR1', 'LAST CALL FOR PARTICIPANTS IN OUR STUDY', 'UPFC Tryouts', 'DNSM DAYS!!'])            
                                    ];
                                } else if ($user->role == 'Teacher') {
                                    return [
                                        'title' => fake()->randomElement(['ON TRAVEL: NO CLASSES THIS WEEK', 'TENTATIVE GRADES ARE OUT', 'NO WRITTEN FINAL EXAM'])            
                                    ];
                                }
                            })
                        )
                        ->has(
                            Activity::factory()->count(15)
                            ->state(function(array $attributes, User $user) {
                                if ($user->role == 'Student') {
                                    return [
                                        'title' => fake()->randomElement(['Assignment', 'Essay', 'Reflection'])            
                                    ];
                                } else if ($user->role == 'Teacher') {
                                    return [
                                        'title' => fake()->randomElement(['Class-wide Final Project', 'Machine Problem', 'Social Media Campaign'])            
                                    ];
                                }
                            }), 'tasks'
                        )
                        ->has(
                            Availability::factory()->count(5)
                        )
                    
                    ->create();
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
