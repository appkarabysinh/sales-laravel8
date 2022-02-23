<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StockResource;
use App\Http\Resources\StockCollection;

class PaymentStocksController extends Controller
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

        $stocks = $payment
            ->stocks()
            ->search($search)
            ->latest()
            ->paginate();

        return new StockCollection($stocks);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Payment $payment)
    {
        $this->authorize('create', Stock::class);

        $validated = $request->validate([
            'product_count_remaining' => ['required', 'max:255'],
        ]);

        $stock = $payment->stocks()->create($validated);

        return new StockResource($stock);
    }
}
