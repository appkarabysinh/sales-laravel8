<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ProductStore;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductStoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductStore::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price_store' => $this->faker->randomNumber,
            'product_id' => \App\Models\Product::factory(),
            'store_id' => \App\Models\Store::factory(),
        ];
    }
}
