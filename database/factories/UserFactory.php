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
        $role = fake()->randomElement(['student', 'instructor']);
        return [
            'uid' => fake()->unique()->randomNumber(5, false),
            'name' => fake()->name(),
            'program' => $role === 'instructor'
                ? fake()->randomElement(['DNSM', 'DH', 'DSS', 'DM'])
                : fake()->randomElement(['BS Computer Science', 'BS Biology']),
            'password' => static::$password ??= Hash::make('password'),
            'availability' => fake()->numberBetween(0,1),
            'role' => $role
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
