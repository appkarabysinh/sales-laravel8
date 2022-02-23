<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentDetailResource;
use App\Http\Resources\PaymentDetailCollection;

class PaymentPaymentDetailsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Payment $payment)
    {
        $this->authorize('view', $payment);

        $search = $request->get('search', '');

        $paymentDetails = $payment
            ->paymentDetails()
            ->search($search)
            ->latest()
            ->paginate();

        return new PaymentDetailCollection($paymentDetails);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Payment $payment)
    {
        $this->authorize('create', PaymentDetail::class);

        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'store_id' => ['required', 'exists:stores,id'],
        ]);

        $paymentDetail = $payment->paymentDetails()->create($validated);

        return new PaymentDetailResource($paymentDetail);
    }
}
