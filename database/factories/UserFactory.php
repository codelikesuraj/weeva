<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Abdulbaki Suraj',
            'phone' => '08188608295',
            'email' => 'codelikesuraj@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$vot4AT9I8vAz7cdb7w.m0uHrTx.Gw60Dr9oh1CR1G7Pqh29G3vPqK',   // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
