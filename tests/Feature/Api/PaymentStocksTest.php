<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Stock;
use App\Models\Payment;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentStocksTest extends TestCase
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
    public function it_gets_payment_stocks()
    {
        $payment = Payment::factory()->create();
        $stocks = Stock::factory()
            ->count(2)
            ->create([
                'payment_id' => $payment->id,
            ]);

        $response = $this->getJson(
            route('api.payments.stocks.index', $payment)
        );

        $response->assertOk()->assertSee($stocks[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_payment_stocks()
    {
        $payment = Payment::factory()->create();
        $data = Stock::factory()
            ->make([
                'payment_id' => $payment->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.payments.stocks.store', $payment),
            $data
        );

        $this->assertDatabaseHas('stocks', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stock = Stock::latest('id')->first();

        $this->assertEquals($payment->id, $stock->payment_id);
    }
}
