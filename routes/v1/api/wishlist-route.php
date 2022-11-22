<?php


//todo public wishlist route
use App\Http\Controllers\V1\Api\WishlistsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(WishlistsController::class)
        ->group(function () {
            Route::post('/create-wishlist', 'create');
            Route::post('/update-wishlist', 'update');
            Route::get('/read-wishlists', 'read');
            Route::post('/read-wishlist-by-id', 'readById');
            Route::post('/delete-wishlist', 'delete');
        });
});
