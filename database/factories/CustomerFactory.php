<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //automatcally adds data
            'customer_name'=>fake()->name(),
            'email'=>fake()->unique()->safeEmail(),
            'gender'=>fake()->randomElement(['male', 'female']),
            'password'=>fake()->password(),
            //'birth_date'=>fake()->date()
            //$table->date('birth_date')->nullable();
        ];
    }
}
