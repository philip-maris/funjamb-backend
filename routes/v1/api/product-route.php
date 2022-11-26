<?php


//todo public product route
use App\Http\Controllers\V1\Api\ProductsController;
use Illuminate\Support\Facades\Route;


    Route::controller(ProductsController::class)
        ->group(function () {
            Route::post('/create-product', 'create')->name("createProduct");
            Route::post('/update-product', 'update')->name("updateProduct");
            Route::get('/read-products', 'read')->name("readProduct");
            Route::post('/read-product-by-id', 'readById')->name("readByIdProduct");
            Route::post('/read-product-by-brand-id', 'readProductByBrandId')->name("readProductByBrandId");
            Route::post('/read-product-by-category-id', 'readProductByCategoryId')->name("readProductByCategoryId");
            Route::post('/filter-product-by-selling-price', 'filterProductBySellingPrice')->name("filterProductBySellingPrice");
            Route::post('/filter-product-by-offering-price', 'readProductOfferPrice')->name("readProductOfferPrice");
            Route::post('/read-product-by-variations', 'readByProductVariation')->name("readByProductVariation");
            Route::post('/delete-product', 'delete')->name("deleteProduct");
        });


