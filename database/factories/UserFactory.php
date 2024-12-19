<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = fake()->randomElement(['Student', 'Teacher']);
        return [
            'id' => fake()->numberBetween(1987,2024) . fake()->unique()->randomNumber(5,true), # create more realistic fake data, despite uniqueness being only on the 5digit code
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => $role,
            'affiliation' => $role === 'Teacher'
                ? fake()->randomElement(['Division of Humanities', 'Division of Social Sciences', 'Division of Natural Sciences and Management', 'Division of Management'])
                : fake()->randomElement(['BS Computer Science', 'BS Biology', 'BS Applied Mathematics', 'BS Accountancy', 'BA Literature', 'BA Political Science', 'BA Multimedia Arts', 'BA Economics', 'BA Psychology']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    /* public function unverified(): static */
    /* { */
    /*     return $this->state(fn (array $attributes) => [ */
    /*         'email_verified_at' => null, */
    /*     ]); */
    /* } */
}
