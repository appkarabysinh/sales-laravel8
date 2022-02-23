<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\PaymentDetail;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductPaymentDetailsTest extends TestCase
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
    public function it_gets_product_payment_details()
    {
        $product = Product::factory()->create();
        $paymentDetails = PaymentDetail::factory()
            ->count(2)
            ->create([
                'product_id' => $product->id,
            ]);

        $response = $this->getJson(
            route('api.products.payment-details.index', $product)
        );

        $response->assertOk()->assertSee($paymentDetails[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_product_payment_details()
    {
        $product = Product::factory()->create();
        $data = PaymentDetail::factory()
            ->make([
                'product_id' => $product->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.products.payment-details.store', $product),
            $data
        );

        unset($data['payment_id']);
        unset($data['product_id']);
        unset($data['store_id']);

        $this->assertDatabaseHas('payment_details', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $paymentDetail = PaymentDetail::latest('id')->first();

        $this->assertEquals($product->id, $paymentDetail->product_id);
    }
}
