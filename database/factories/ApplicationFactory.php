<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dealerId = DB::table('dealers')->inRandomOrder()->value('id');
        $dealerEmployeeId = DB::table('dealer_employees')->where('dealer_id', $dealerId)->inRandomOrder()->value('id');
        $bankId = DB::table('banks')->inRandomOrder()->value('id');
        $applicationStatusId = DB::table('application_statuses')->inRandomOrder()->value('id');

        return [
            'dealer_id' => $dealerId,
            'dealer_employee_id' => $dealerEmployeeId,
            'bank_id' => $bankId,
            'loan_amount' => fake()->randomFloat(2, 1000, 5000000),
            'loan_term' => fake()->numberBetween(1, 6),
            'interest_rate' => fake()->randomFloat(2, 1, 13),
            'reason_description' => fake()->text(30), // Текст меньше 3 предложений
            'application_status_id' => $applicationStatusId,
        ];
    }
}
