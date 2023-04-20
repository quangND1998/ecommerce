<?php

use App\Http\Controllers\Admin\PermisionsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LandingPage\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cart\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\LandingPage\BlogController;
use App\Http\Controllers\SaleItemController;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return view('landingpage.index');
// });
Route::get('/', [ProductController::class,'index']);
Route::get('product/{name}', [ProductController::class,'product']);
Route::get('/blogs', [BlogController::class,'index']);
Route::get('/blog/{title}.html', [BlogController::class,'blog_detail']);
// Route::get('/item-blog', function () {
//     return view('landingpage.itemBlog');
// });
Route::get('/successfully', function () {
    return view('landingpage.successfully');
});
Route::get('/tracking', function () {
    return view('landingpage.SearchTrackingShipping');
});
Route::get('/tracking-shipping', function () {
    return view('landingpage.TrackingShipping');
});

Route::get('/product1', function () {
    return view('landingpage.product1');
});
Route::get('product_detail/{name}', [ProductController::class,'product_detail']);
Route::post('addtocart', [CartController::class,'addToCart'])->name('addtocart');
Route::post('buynow', [CartController::class,'buynow'])->name('buynow');
Route::get('clearcart', [CartController::class,'clearcart'])->name('clearcart');
Route::post('updateCart', [CartController::class,'updateCart'])->name('updateCart');
Route::post('removeItem', [CartController::class,'removeItem'])->name('removeItem');

Route::get('/checkout', [ProductController::class, 'checkout']);
Route::post('/checkout', [ProductController::class, 'saveCheckout'])->name('checkout');
// Route::get('/orderfinal', [ProductController::class,'orderfinal'])->name('orderfinal');
Route::get('/route', function () {
    return Inertia::render('Index');
})->name('route');

Route::get('/product', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth'])->name('product');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::get('/test', [TestController::class, 'index']);


Route::middleware(['auth'])->group(
    function () {
        Route::prefix('permissions')->as('permissions.')->group(function () {
            Route::get('', [PermisionsController::class, 'index'])->name('index');
            Route::post('', [PermisionsController::class, 'store'])->name('store');
            Route::put('/update/{id}', [PermisionsController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [PermisionsController::class, 'delete'])->name('delete');
        });

        Route::prefix('roles')->as('roles.')->group(function () {
            Route::get('', [RoleController::class, 'index'])->name('index');
            Route::post('', [RoleController::class, 'store'])->name('store');
            Route::put('/update/{id}', [RoleController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
        });

        Route::prefix('users')->as('users.')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('index');
            Route::post('', [UserController::class, 'store'])->name('store');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
            // Route::post('import/user',  [UserController::class, 'import'])->name('import');
        });
        Route::prefix('admin')->group(function () {
            Route::prefix('sales')->as('sales.')->group(function () {
                Route::get('', [SaleController::class, 'index'])->name('index');
                Route::get('create', [SaleController::class, 'create'])->name('create');
                Route::get('detail/{sale}', [SaleController::class, 'detailSale'])->name('detail');


                Route::post('changeState', [SaleController::class, 'changeState'])->name('changeState');
                Route::post('', [SaleController::class, 'store'])->name('store');
                Route::put('/update/{sale}', [SaleController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [SaleController::class, 'destroy'])->name('destroy');

                Route::post('import/{sale}',  [SaleController::class, 'importSale'])->name('import');
                Route::delete('items/delete', [SaleItemController::class, 'deleteItems'])->name('deleteItems');
                Route::get('addProducts/{sale}', [SaleItemController::class, 'addProducts'])->name('addProducts');

                Route::post('saveItems/{sale}', [SaleItemController::class, 'saveItems'])->name('saveItems');
                Route::post('updateDiscount', [SaleItemController::class, 'updateDiscount'])->name('updateDiscount');
            });

            Route::prefix('customers')->as('customers.')->group(function () {
                Route::get('', [CustomerController::class, 'index'])->name('index');
                Route::get('export', [CustomerController::class, 'export'])->name('export');
            });
        });
    }
);
require __DIR__ . '/auth.php';
