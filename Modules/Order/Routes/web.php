<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\OrderController;
use Modules\Order\Http\Controllers\PaymentInforController;
use Modules\Order\Http\Controllers\PaymentMethodsController;
use Modules\Order\Http\Controllers\ShippingFeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('order')->group(function () {
    Route::get('/', 'OrderController@index');
});



Route::middleware(['auth'])->prefix('admin')->group(
    function () {
        Route::prefix('shipping-fee')->as('shipping-fee.')->group(function () {
            Route::get('/', [ShippingFeeController::class, 'index'])->name('index');
            Route::post('/', [ShippingFeeController::class, 'store'])->name('store');
            Route::put('/update/{shipping}', [ShippingFeeController::class, 'update'])->name('update');
            Route::delete('/delete/{shipping}', [ShippingFeeController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('orders')->as('orders.')->group(function () {
            Route::get('/pending', [OrderController::class, 'pending'])->name('pending');
            Route::get('/packing', [OrderController::class, 'packing'])->name('packing');
            Route::get('/shipping', [OrderController::class, 'shipping'])->name('shipping');
            Route::get('/completed', [OrderController::class, 'completed'])->name('completed');
            Route::get('/refund', [OrderController::class, 'refund'])->name('refund');
            Route::get('/decline', [OrderController::class, 'decline'])->name('decline');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/', [OrderController::class, 'store'])->name('store');
            Route::put('/update/{shipping}', [OrderController::class, 'update'])->name('update');
            Route::delete('/delete/{shipping}', [OrderController::class, 'destroy'])->name('destroy');
            Route::post('createOrder', [OrderController::class, 'createOrder'])->name('createOrder');
            Route::post('updateOrder', [OrderController::class, 'updateOrder'])->name('updateOrder');

            /**
             * Update status order
             *
             */

            Route::post('orderCancel/{order}', [OrderController::class, 'orderCancel'])->name('orderCancel');
            Route::post('orderRefund/{order}', [OrderController::class, 'orderRefund'])->name('orderRefund');

            Route::post('orderChangeStatus/{order}', [OrderController::class, 'orderChangeStatus'])->name('orderChangeStatus');
            Route::post('orderChangePayment', [OrderController::class, 'orderChangePayment'])->name('orderChangePayment');

            Route::get('export', [OrderController::class, 'export'])->name('export');
        });


        Route::prefix('payments')->as('payment.')->group(function () {
            Route::get('/', [PaymentMethodsController::class, 'index'])->name('index');
            Route::get('/infor/{payment}', [PaymentMethodsController::class, 'show'])->name('show');
            Route::post('/', [PaymentMethodsController::class, 'store'])->name('store');
            Route::post('/update/{payment}', [PaymentMethodsController::class, 'update'])->name('update');
            Route::delete('/delete/{payment}', [PaymentMethodsController::class, 'destroy'])->name('destroy');

            Route::post('priority', [PaymentMethodsController::class, 'priority'])->name('priority');

            Route::prefix('infor')->as('infor.')->group(function () {

                Route::post('/{payment}', [PaymentInforController::class, 'store'])->name('store');
                Route::post('/update/{payment}', [PaymentInforController::class, 'update'])->name('update');
            });
        });


        Route::prefix('cart')->as('cart.')->group(function () {

            Route::post('/addProductCart', [OrderController::class, 'addProductCart'])->name('addProductCart');
            Route::post('/updateCart', [OrderController::class, 'updateCart'])->name('updateCart');
            Route::post('/removeItem', [OrderController::class, 'removeItem'])->name('removeItem');
            Route::post('/removeCart', [OrderController::class, 'removeCart'])->name('removeCart');
            Route::post('/deleteCarts', [OrderController::class, 'deleteMultipleItem'])->name('deleteCarts');

            // Route::put('/update/{shipping}', [PaymentMethodsController::class, 'update'])->name('update');
            // Route::delete('/delete/{shipping}', [PaymentMethodsController::class, 'destroy'])->name('destroy');
        });
    }
);
