<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Payment;
use App\Models\PaymentDetail;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentPaymentDetailsTest extends TestCase
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
    public function it_gets_payment_payment_details()
    {
        $payment = Payment::factory()->create();
        $paymentDetails = PaymentDetail::factory()
            ->count(2)
            ->create([
                'payment_id' => $payment->id,
            ]);

        $response = $this->getJson(
            route('api.payments.payment-details.index', $payment)
        );

        $response->assertOk()->assertSee($paymentDetails[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_payment_payment_details()
    {
        $payment = Payment::factory()->create();
        $data = PaymentDetail::factory()
            ->make([
                'payment_id' => $payment->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.payments.payment-details.store', $payment),
            $data
        );

        unset($data['payment_id']);
        unset($data['product_id']);
        unset($data['store_id']);

        $this->assertDatabaseHas('payment_details', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $paymentDetail = PaymentDetail::latest('id')->first();

        $this->assertEquals($payment->id, $paymentDetail->payment_id);
    }
}
