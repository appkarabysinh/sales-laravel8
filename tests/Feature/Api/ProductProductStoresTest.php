<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductStore;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductProductStoresTest extends TestCase
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
    public function it_gets_product_product_stores()
    {
        $product = Product::factory()->create();
        $productStores = ProductStore::factory()
            ->count(2)
            ->create([
                'product_id' => $product->id,
            ]);

        $response = $this->getJson(
            route('api.products.product-stores.index', $product)
        );

        $response->assertOk()->assertSee($productStores[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_product_product_stores()
    {
        $product = Product::factory()->create();
        $data = ProductStore::factory()
            ->make([
                'product_id' => $product->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.products.product-stores.store', $product),
            $data
        );

        unset($data['price_store']);
        unset($data['product_id']);
        unset($data['store_id']);

        $this->assertDatabaseHas('product_stores', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $productStore = ProductStore::latest('id')->first();

        $this->assertEquals($product->id, $productStore->product_id);
    }
}
