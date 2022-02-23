<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.order_details.index',
            compact('orderDetails', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', OrderDetail::class);

        return view('app.order_details.create');
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

        return redirect()
            ->route('order-details.edit', $orderDetail)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderDetail $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OrderDetail $orderDetail)
    {
        $this->authorize('view', $orderDetail);

        return view('app.order_details.show', compact('orderDetail'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderDetail $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, OrderDetail $orderDetail)
    {
        $this->authorize('update', $orderDetail);

        return view('app.order_details.edit', compact('orderDetail'));
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

        return redirect()
            ->route('order-details.edit', $orderDetail)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('order-details.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
