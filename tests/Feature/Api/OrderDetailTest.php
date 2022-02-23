<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\OrderDetail;

use App\Models\Order;
use App\Models\Product;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderDetailTest extends TestCase
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
    public function it_gets_order_details_list()
    {
        $orderDetails = OrderDetail::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.order-details.index'));

        $response->assertOk()->assertSee($orderDetails[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_order_detail()
    {
        $data = OrderDetail::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.order-details.store'), $data);

        $this->assertDatabaseHas('order_details', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_order_detail()
    {
        $orderDetail = OrderDetail::factory()->create();

        $product = Product::factory()->create();
        $order = Order::factory()->create();

        $data = [
            'product_id' => $this->faker->randomNumber,
            'order_id' => $this->faker->randomNumber,
            'price' => $this->faker->randomNumber,
            'product_count' => $this->faker->randomNumber,
            'product_id' => $product->id,
            'order_id' => $order->id,
        ];

        $response = $this->putJson(
            route('api.order-details.update', $orderDetail),
            $data
        );

        $data['id'] = $orderDetail->id;

        $this->assertDatabaseHas('order_details', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_order_detail()
    {
        $orderDetail = OrderDetail::factory()->create();

        $response = $this->deleteJson(
            route('api.order-details.destroy', $orderDetail)
        );

        $this->assertDeleted($orderDetail);

        $response->assertNoContent();
    }
}
