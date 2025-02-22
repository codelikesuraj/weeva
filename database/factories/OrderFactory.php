<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Contact;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owned_by' => User::factory(),
            'waybill_no' => '00002022',
            'quantity' => 20,
            'description' => 'this is a description',
            'customer_name' => 'Mrs. Jane Doe',
            'issued_by' => Contact::factory(),
        ];
    }
}
