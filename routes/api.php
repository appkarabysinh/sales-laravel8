<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderDetailController;
use App\Http\Controllers\Api\UserProductsController;
use App\Http\Controllers\Api\ProductCardsController;
use App\Http\Controllers\Api\OrderPaymentsController;
use App\Http\Controllers\Api\OrderOrderDetailsController;
use App\Http\Controllers\Api\ProductOrderDetailsController;
use App\Http\Controllers\Api\ProductProductStoresController;
use App\Http\Controllers\Api\PaymentPaymentDetailsController;
use App\Http\Controllers\Api\ProductPaymentDetailsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('users', UserController::class);

        // User Products
        Route::get('/users/{user}/products', [
            UserProductsController::class,
            'index',
        ])->name('users.products.index');
        Route::post('/users/{user}/products', [
            UserProductsController::class,
            'store',
        ])->name('users.products.store');

        Route::apiResource('orders', OrderController::class);

        // Order Payments
        Route::get('/orders/{order}/payments', [
            OrderPaymentsController::class,
            'index',
        ])->name('orders.payments.index');
        Route::post('/orders/{order}/payments', [
            OrderPaymentsController::class,
            'store',
        ])->name('orders.payments.store');

        // Order Order Details
        Route::get('/orders/{order}/order-details', [
            OrderOrderDetailsController::class,
            'index',
        ])->name('orders.order-details.index');
        Route::post('/orders/{order}/order-details', [
            OrderOrderDetailsController::class,
            'store',
        ])->name('orders.order-details.store');

        Route::apiResource('order-details', OrderDetailController::class);

        Route::apiResource('payments', PaymentController::class);

        // Payment Payment Details
        Route::get('/payments/{payment}/payment-details', [
            PaymentPaymentDetailsController::class,
            'index',
        ])->name('payments.payment-details.index');
        Route::post('/payments/{payment}/payment-details', [
            PaymentPaymentDetailsController::class,
            'store',
        ])->name('payments.payment-details.store');

        Route::apiResource('products', ProductController::class);

        // Product All Cards
        Route::get('/products/{product}/cards', [
            ProductCardsController::class,
            'index',
        ])->name('products.cards.index');
        Route::post('/products/{product}/cards', [
            ProductCardsController::class,
            'store',
        ])->name('products.cards.store');

        // Product Order Details
        Route::get('/products/{product}/order-details', [
            ProductOrderDetailsController::class,
            'index',
        ])->name('products.order-details.index');
        Route::post('/products/{product}/order-details', [
            ProductOrderDetailsController::class,
            'store',
        ])->name('products.order-details.store');

        // Product Product Stores
        Route::get('/products/{product}/product-stores', [
            ProductProductStoresController::class,
            'index',
        ])->name('products.product-stores.index');
        Route::post('/products/{product}/product-stores', [
            ProductProductStoresController::class,
            'store',
        ])->name('products.product-stores.store');

        // Product Payment Details
        Route::get('/products/{product}/payment-details', [
            ProductPaymentDetailsController::class,
            'index',
        ])->name('products.payment-details.index');
        Route::post('/products/{product}/payment-details', [
            ProductPaymentDetailsController::class,
            'store',
        ])->name('products.payment-details.store');

        Route::apiResource('stocks', StockController::class);

        Route::apiResource('cards', CardController::class);
    });
