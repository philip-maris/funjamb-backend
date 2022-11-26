<?php


//todo public wishlist route
use App\Http\Controllers\V1\Api\WishlistsController;
use Illuminate\Support\Facades\Route;

    Route::controller(WishlistsController::class)
        ->group(function () {
            Route::post('/create-wishlist', 'create');
            Route::post('/update-wishlist', 'update');
            Route::get('/read-wishlists', 'read');
            Route::post('/read-wishlist-by-customer-id', 'readWishlistByCustomerId');
            Route::post('/read-wishlist-by-id', 'readById');
            Route::post('/delete-wishlist', 'delete');
        });

