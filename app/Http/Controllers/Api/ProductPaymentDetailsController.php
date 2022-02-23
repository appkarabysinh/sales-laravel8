<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentDetailResource;
use App\Http\Resources\PaymentDetailCollection;

class ProductPaymentDetailsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        $this->authorize('view', $product);

        $search = $request->get('search', '');

        $paymentDetails = $product
            ->paymentDetails()
            ->search($search)
            ->latest()
            ->paginate();

        return new PaymentDetailCollection($paymentDetails);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->authorize('create', PaymentDetail::class);

        $validated = $request->validate([
            'payment_id' => ['required', 'exists:payments,id'],
            'store_id' => ['required', 'exists:stores,id'],
        ]);

        $paymentDetail = $product->paymentDetails()->create($validated);

        return new PaymentDetailResource($paymentDetail);
    }
}
