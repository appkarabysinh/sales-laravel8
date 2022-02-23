<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PaymentDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_id' => \App\Models\Payment::factory(),
            'store_id' => \App\Models\Store::factory(),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
