<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cashier>
 */
class CashierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $branch_id = Branch::select('id')->inRandomOrder()->first()->id;
        return [
            'branch_id' => $branch_id,
            'firstname' => fake()->firstName(),
            'middlename' => fake()->optional()->firstName(),
            'lastname' => fake()->lastName(),
            'address' => fake()->address(),
        ];
    }
}
