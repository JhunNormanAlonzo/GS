<?php

namespace Database\Factories;

use App\Models\Cashier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $user = Role::where('name', 'branch-head')
            ->first()
            ->users()
            ->inRandomOrder()
            ->first();

        $cashier = Cashier::inRandomOrder()
            ->first();


        $name = $user->name;
        $user_id = $user->id;
        $branch_id = $user->branch_id;

        $collectionDate = $this->faker->dateTimeBetween('-2 months', '-1 month');

        return [
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'cashier_id' => $cashier->id ?? 1,
            'user' => $name,
            'collection_date' => $collectionDate,
            'shift' => $this->faker->randomElement(['AM', 'PM', 'NIGHT']),
            'cashier' => $cashier->name,
            'gross' => $this->faker->randomFloat(2, 0, 1000),
            'paid_in' => $this->faker->randomFloat(2, 0, 500),
            'purchase_order' => $this->faker->randomFloat(2, 0, 100),
            'paid_out' => $this->faker->randomFloat(2, 0, 100),
            'redeem' => $this->faker->randomFloat(2, 0, 50),
            'discount' => $this->faker->randomFloat(2, 0, 20),
            'lubes' => $this->faker->randomFloat(2, 0, 50),
            'net' => function (array $attributes) {
                return $attributes['gross']
                    - $attributes['purchase_order']
                    - $attributes['paid_out']
                    - $attributes['redeem']
                    - $attributes['discount']
                    + $attributes['paid_in']
                    + $attributes['lubes'];
            },
            'cheque' => $this->faker->randomFloat(2, 0, 200),
            'cash_on_hand' => $this->faker->randomFloat(2, 0, 1000),
            'short_over' => function (array $attributes) {
                return $attributes['cash_on_hand'] - $attributes['net'];
            },
        ];
    }
}
