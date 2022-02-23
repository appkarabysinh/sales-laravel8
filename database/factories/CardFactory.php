<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_title' => $this->faker->text(255),
            'card_description' => $this->faker->text(255),
            'product_count' => $this->faker->randomNumber,
            'card_price_sale' => $this->faker->randomNumber,
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
