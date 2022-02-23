<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderDetailCollection;
use App\Http\Requests\OrderDetailStoreRequest;
use App\Http\Requests\OrderDetailUpdateRequest;

class OrderDetailController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', OrderDetail::class);

        $search = $request->get('search', '');

        $orderDetails = OrderDetail::search($search)
            ->latest()
            ->paginate();

        return new OrderDetailCollection($orderDetails);
    }

    /**
     * @param \App\Http\Requests\OrderDetailStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderDetailStoreRequest $request)
    {
        $this->authorize('create', OrderDetail::class);

        $validated = $request->validated();

        $orderDetail = OrderDetail::create($validated);

        return new OrderDetailResource($orderDetail);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderDetail $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OrderDetail $orderDetail)
    {
        $this->authorize('view', $orderDetail);

        return new OrderDetailResource($orderDetail);
    }

    /**
     * @param \App\Http\Requests\OrderDetailUpdateRequest $request
     * @param \App\Models\OrderDetail $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(
        OrderDetailUpdateRequest $request,
        OrderDetail $orderDetail
    ) {
        $this->authorize('update', $orderDetail);

        $validated = $request->validated();

        $orderDetail->update($validated);

        return new OrderDetailResource($orderDetail);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderDetail $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, OrderDetail $orderDetail)
    {
        $this->authorize('delete', $orderDetail);

        $orderDetail->delete();

        return response()->noContent();
    }
}
