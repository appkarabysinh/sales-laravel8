<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Card;
use App\Models\Product;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCardsTest extends TestCase
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
    public function it_gets_product_cards()
    {
        $product = Product::factory()->create();
        $cards = Card::factory()
            ->count(2)
            ->create([
                'product_id' => $product->id,
            ]);

        $response = $this->getJson(route('api.products.cards.index', $product));

        $response->assertOk()->assertSee($cards[0]->card_title);
    }

    /**
     * @test
     */
    public function it_stores_the_product_cards()
    {
        $product = Product::factory()->create();
        $data = Card::factory()
            ->make([
                'product_id' => $product->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.products.cards.store', $product),
            $data
        );

        $this->assertDatabaseHas('cards', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $card = Card::latest('id')->first();

        $this->assertEquals($product->id, $card->product_id);
    }
}
