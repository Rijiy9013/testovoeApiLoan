<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DealerEmployee>
 */
class DealerEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dealer_id' => function () {
                return \App\Models\Dealer::inRandomOrder()->first()->id;
            },
            'name' => fake()->name,
        ];
    }
}
