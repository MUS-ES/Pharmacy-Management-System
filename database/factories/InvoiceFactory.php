<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total' => $this->faker->randomNumber(5),
            'customer_id' => $this->faker->randomNumber(1),
            'user_id' => $this->faker->randomNumber(1),
            'payment_id' => $this->faker->randomNumber(1),

        ];
    }
}
