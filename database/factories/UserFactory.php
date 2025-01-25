<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'studentnummer' => $this->faker->unique()->numerify('S#####'),
            'role' => $this->faker->randomElement(['speler', 'beheerder', 'trainer']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->optional()->dateTime(),
            'password' => bcrypt('password'), // Je kunt ook gebruik maken van een gehashte waarde
            'remember_token' => Str::random(10),
        ];
    }
}
