<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Card;

use App\Models\Product;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CardTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_cards_list()
    {
        $cards = Card::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.cards.index'));

        $response->assertOk()->assertSee($cards[0]->card_title);
    }

    /**
     * @test
     */
    public function it_stores_the_card()
    {
        $data = Card::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.cards.store'), $data);

        $this->assertDatabaseHas('cards', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_card()
    {
        $card = Card::factory()->create();

        $product = Product::factory()->create();

        $data = [
            'card_title' => $this->faker->text(255),
            'card_description' => $this->faker->text(255),
            'product_count' => $this->faker->randomNumber,
            'card_price_sale' => $this->faker->randomNumber,
            'product_id' => $this->faker->word,
            'product_id' => $product->id,
        ];

        $response = $this->putJson(route('api.cards.update', $card), $data);

        $data['id'] = $card->id;

        $this->assertDatabaseHas('cards', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_card()
    {
        $card = Card::factory()->create();

        $response = $this->deleteJson(route('api.cards.destroy', $card));

        $this->assertDeleted($card);

        $response->assertNoContent();
    }
}
