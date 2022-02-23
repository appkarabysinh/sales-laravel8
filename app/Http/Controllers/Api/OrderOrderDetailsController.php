<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderDetailCollection;

class OrderOrderDetailsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Order $order)
    {
        $this->authorize('view', $order);

        $search = $request->get('search', '');

        $orderDetails = $order
            ->orderDetails()
            ->search($search)
            ->latest()
            ->paginate();

        return new OrderDetailCollection($orderDetails);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $this->authorize('create', OrderDetail::class);

        $validated = $request->validate([
            'product_id' => ['required', 'max:255'],
            'order_id' => ['required', 'max:255'],
            'price' => ['required', 'max:255'],
            'product_count' => ['required', 'max:255'],
        ]);

        $orderDetail = $order->orderDetails()->create($validated);

        return new OrderDetailResource($orderDetail);
    }
}
