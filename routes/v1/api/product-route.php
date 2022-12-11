<?php


//todo public product route
use App\Http\Controllers\V1\Api\ProductsController;
use Illuminate\Support\Facades\Route;


    Route::controller(ProductsController::class)
        ->group(function () {
            Route::post('/create-product', 'create');
            Route::post('/update-product', 'update');
            Route::get('/read-products', 'read');
            Route::post('/read-product-by-id', 'readById');
            Route::post('/read-product-by-brand-id', 'readProductByBrandId');
            Route::post('/read-product-by-category-id', 'readProductByCategoryId');
            Route::post('/filter-product-by-selling-price', 'filterProductBySellingPrice');
            Route::post('/filter-product-by-offering-price', 'readProductOfferPrice');
            Route::post('/read-product-by-variations', 'readByProductVariation');
            Route::post('/delete-product', 'delete');
        });


