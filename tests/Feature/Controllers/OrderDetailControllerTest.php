<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\OrderDetail;

use App\Models\Order;
use App\Models\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderDetailControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_order_details()
    {
        $orderDetails = OrderDetail::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('order-details.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.order_details.index')
            ->assertViewHas('orderDetails');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_order_detail()
    {
        $response = $this->get(route('order-details.create'));

        $response->assertOk()->assertViewIs('app.order_details.create');
    }

    /**
     * @test
     */
    public function it_stores_the_order_detail()
    {
        $data = OrderDetail::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('order-details.store'), $data);

        $this->assertDatabaseHas('order_details', $data);

        $orderDetail = OrderDetail::latest('id')->first();

        $response->assertRedirect(route('order-details.edit', $orderDetail));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_order_detail()
    {
        $orderDetail = OrderDetail::factory()->create();

        $response = $this->get(route('order-details.show', $orderDetail));

        $response
            ->assertOk()
            ->assertViewIs('app.order_details.show')
            ->assertViewHas('orderDetail');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_order_detail()
    {
        $orderDetail = OrderDetail::factory()->create();

        $response = $this->get(route('order-details.edit', $orderDetail));

        $response
            ->assertOk()
            ->assertViewIs('app.order_details.edit')
            ->assertViewHas('orderDetail');
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

        $response = $this->put(
            route('order-details.update', $orderDetail),
            $data
        );

        $data['id'] = $orderDetail->id;

        $this->assertDatabaseHas('order_details', $data);

        $response->assertRedirect(route('order-details.edit', $orderDetail));
    }

    /**
     * @test
     */
    public function it_deletes_the_order_detail()
    {
        $orderDetail = OrderDetail::factory()->create();

        $response = $this->delete(route('order-details.destroy', $orderDetail));

        $response->assertRedirect(route('order-details.index'));

        $this->assertDeleted($orderDetail);
    }
}
