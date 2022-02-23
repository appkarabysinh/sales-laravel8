<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\CardResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardCollection;

class ProductCardsController extends Controller
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

        $cards = $product
            ->allCards()
            ->search($search)
            ->latest()
            ->paginate();

        return new CardCollection($cards);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->authorize('create', Card::class);

        $validated = $request->validate([
            'card_title' => ['required', 'max:255', 'string'],
            'card_description' => ['required', 'max:255', 'string'],
            'product_count' => ['required', 'max:255'],
            'card_price_sale' => ['required', 'max:255'],
        ]);

        $card = $product->allCards()->create($validated);

        return new CardResource($card);
    }
}
