<?php

use Illuminate\Support\Facades\Route;
use Modules\ProductCategory\Entities\CategoryProduct;
use Modules\ProductCategory\Http\Controllers\AttributeController;
use Modules\ProductCategory\Http\Controllers\AtrributeController;
use Modules\ProductCategory\Http\Controllers\AttributeValueController;
use Modules\ProductCategory\Http\Controllers\CategoryProductController;
use Modules\ProductCategory\Http\Controllers\OptionsController;
use Modules\ProductCategory\Http\Controllers\OptionValueController;
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

use Modules\ProductCategory\Http\Controllers\ProductCategoryController;
use Modules\ProductCategory\Http\Controllers\ProductController;
use Modules\ProductCategory\Http\Controllers\ProductImageController;
use Modules\ProductCategory\Http\Controllers\VariantController;

Route::middleware(['auth'])->prefix('admin')->group(
    function () {
        Route::prefix('categories')->as('categories.')->group(function () {
            Route::get('/', [CategoryProductController::class, 'index'])->name('index');
            Route::post('/store', [CategoryProductController::class, 'store'])->name('store');
            Route::post('/update/{category}', [CategoryProductController::class, 'update'])->name('update');
            Route::delete('/delete/{category}', [CategoryProductController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('attributes')->as('attributes.')->group(function () {
            Route::get('/', [AttributeController::class, 'index'])->name('index');
            Route::post('/store', [AttributeController::class, 'store'])->name('store');
            Route::post('/update/{attribute}', [AttributeController::class, 'update'])->name('update');
            Route::delete('/delete/{attribute}', [AttributeController::class, 'destroy'])->name('destroy');
            // Load Attribute by category return json
            Route::post('values', [AttributeController::class, 'loadAttributes']);

            Route::prefix('{attribute}/attribute-values')->as('attribute-values.')->group(function () {
                Route::get('/', [AttributeValueController::class, 'index'])->name('index');
                Route::post('/store', [AttributeValueController::class, 'store'])->name('store');
            });
        });

        Route::prefix('attribute-values')->as('attribute-values.')->group(function () {
            Route::post('/update/{attribute_value}', [AttributeValueController::class, 'update'])->name('update');
            Route::delete('/delete/{attribute_value}', [AttributeValueController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('warehouse')->as('warehouse.')->group(function () {
            Route::get('', [ProductController::class, 'index'])->name('index');
            Route::post('', [ProductController::class, 'store'])->name('store');
            Route::get('{slug}', [ProductController::class, 'show'])->name('show');
            Route::get('{slug}/create', [ProductController::class, 'create'])->name('create');
            Route::get('/{slug}/edit/{product}', [ProductController::class, 'edit'])->name('edit');
            Route::post('update/{product}', [ProductController::class, 'update'])->name('update');
            Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
            // // Attributes
            Route::get('/{slug}/product/{product}/attributes', [ProductController::class, 'attributes'])->name('attributes');

            Route::post('changeStatus', [ProductController::class, 'changeStatus'])->name('changeStatus');
            Route::post('changeOutStanding', [ProductController::class, 'changeOutStanding'])->name('changeOutStanding');
            Route::post('changeActive', [ProductController::class, 'changeActive'])->name('changeActive');

            Route::delete('deleteProducts', [ProductController::class, 'DeleteProducts'])->name('DeleteProducts');

            Route::post('saveCost', [ProductController::class, 'saveCost']);
            Route::post('importProduct', [ProductController::class, 'importProduct'])->name('importProduct');
            Route::get('product/export', [ProductController::class, 'export'])->name('export');
            Route::get('product/exportbyCategory/{slug}', [ProductController::class, 'exportbyCategory'])->name('exportbyCategory');
        });

        Route::prefix('warehouse/{slug}/{product}/images')->as('images.')->group(function () {
            Route::get('', [ProductImageController::class, 'index'])->name('index');
        });

        Route::prefix('product')->as('product.')->group(function () {
            Route::prefix('{product}/images')->as('images.')->group(function () {
                Route::post('', [ProductImageController::class, 'store'])->name('store');
            });
            Route::prefix('/image/{image}')->as('images.')->group(function () {
                Route::post('', [ProductImageController::class, 'update'])->name('update');
                Route::delete('delete', [ProductImageController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('images')->as('images.')->group(function () {
                Route::post('priority', [ProductImageController::class, 'priority'])->name('priority');
            });

            Route::prefix('{product}/options')->as('option.')->group(function () {
                Route::get('/', [OptionsController::class, 'index'])->name('index');
                Route::post('/store', [OptionsController::class, 'store'])->name('store');
            });
            Route::prefix('options')->as('option.')->group(function () {
                Route::put('/{option}/update', [OptionsController::class, 'update'])->name('update');
                Route::delete('/{option}/delete', [OptionsController::class, 'destroy'])->name('destroy');

                Route::prefix('{option}/values')->as('value.')->group(function () {
                    Route::post('/store', [OptionValueController::class, 'store'])->name('store');
                });
                Route::prefix('/value')->as('value.')->group(function () {
                    Route::put('/{option_value}/update', [OptionValueController::class, 'update'])->name('update');
                    Route::delete('/{value}/delete', [OptionValueController::class, 'destroy'])->name('destroy');
                });
            });

            Route::prefix('variant')->as('variant.')->group(function () {
                Route::post('', [VariantController::class, 'store'])->name('store');
            });

            // Route::post('attributes/{product}', [ProductController::class, 'saveAttribute'])->name('saveAttribute');
        });
    }
);
