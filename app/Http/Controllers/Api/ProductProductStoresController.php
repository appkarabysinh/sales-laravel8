<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductStoreResource;
use App\Http\Resources\ProductStoreCollection;

class ProductProductStoresController extends Controller
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

        $productStores = $product
            ->productStores()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProductStoreCollection($productStores);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->authorize('create', ProductStore::class);

        $validated = $request->validate([
            'price_store' => ['required', 'max:255'],
            'store_id' => ['required', 'exists:stores,id'],
        ]);

        $productStore = $product->productStores()->create($validated);

        return new ProductStoreResource($productStore);
    }
}
