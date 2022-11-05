<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthenticationsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductVariationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function (){
    //todo public routes
        //todo public customer route
        Route::controller(CustomersController::class)->group(function (){
            Route::get('/read-customer', 'read');
            Route::post('/read-customer-by-id', 'readById');
        });
        //todo public authentication route
        Route::controller(AuthenticationsController::class)
            ->group(function (){
                Route::post('/initiate-enrollment', 'initiateEnrollment');
                Route::post('/complete-enrollment', 'completeEnrollment');
                Route::post('/initiate-forgotten-password', 'initiateForgottenPassword');
                Route::post('/complete-forgotten-password', 'completeForgottenPassword');
                Route::post('/change-password', 'changePassword');
                Route::post('/login', 'login');
                Route::post('/resend-otp', 'resendOtp');
            });
    //todo public product route
        Route::controller(ProductsController::class)
            ->group(function (){
                Route::post('/create-product', 'create')->name("createProduct");
                Route::post('/update-product', 'update')->name("updateProduct");
                Route::get('/read-products', 'read')->name("readProduct");
                Route::post('/read-product-by-id', 'readById')->name("readByIdProduct");
                Route::post('/read-product-by-variations', 'readByProductVariation')->name("readByProductVariation");
                Route::post('/delete-product', 'delete')->name("deleteProduct");
            });
    //todo public category route
        Route::controller(CategoriesController::class)
            ->group(function (){
                Route::post('/create-category', 'create')->name('createCategory');
                Route::post('/update-category', 'update')->name('updateCategory');
                Route::get('/read-categories', 'read')->name('readCategory');
                Route::post('/read-category-by-id', 'readById')->name('readByIdCategory');
                Route::post('/delete-category', 'delete')->name('deleteCategory');
            });

    //todo public wishlist route
    Route::controller(WishlistsController::class)
        ->group(function (){
            Route::post('/create-wishlist', 'create');
            Route::post('/update-wishlist', 'update');
            Route::get('/read-wishlists', 'read');
            Route::post('/read-wishlist-by-id', 'readById');
            Route::post('/delete-wishlist', 'delete');
        });

    //todo delivery route
    Route::controller(DeliveryController::class)->group(function (){
        Route::get('/read-delivery', 'read');
        Route::post('/create-delivery', 'create');
        Route::post('/read-delivery-by-id', 'readById');
        Route::post('/update-delivery', 'update');
    });

    //todo order route
    Route::controller(OrderController::class)->group(function (){
        Route::get('/read-orders', 'read');
        Route::post('/create-order', 'create');
        Route::post('/read-order-by-id', 'readById');
        Route::post('/update-order', 'update');
    });

    //todo cart route
    Route::controller(CartController::class)->group(function (){
        Route::post('/create-cart', 'create');
        Route::post('/read-cart-by-customer', 'readByCustomerId');
        Route::post('/update-cart', 'update');
        Route::post('/delete-cart', 'delete');
    });


    //todo public brand route
    Route::controller(BrandsController::class)
        ->group(function (){
            Route::post('/create-brand', 'create')->name('createBrand');
            Route::post('/update-brand', 'update')->name('updateBrand');
            Route::get('/read-brands', 'read')->name('readBrand');
            Route::post('/read-brand-by-id', 'readById')->name('readByIdBrand');
            Route::post('/delete-brand', 'delete')->name('deleteBrand');
        });

    //todo banner route
    Route::controller(BannerController::class)->group(function (){
        Route::get('/read-banners', 'read');
        Route::post('/create-banner', 'create');
        Route::post('/read-banner-by-id', 'readById');
        Route::post('/update-banner', 'update');
    });

    //todo transaction route
    Route::controller(TransactionController::class)->group(function (){
        Route::get('/read-transactions', 'read');
        Route::post('/create-transaction', 'create');
        Route::post('/read-transaction-by-id', 'readById');
    });

    //todo review route
    Route::controller(ReviewController::class)->group(function (){
        Route::get('/read-reviews', 'read');
        Route::post('/create-review', 'create');
        Route::post('/read-review-by-id', 'readById');
        Route::post('/read-product-review', 'readByProductId');
    });

    //todo subscription route
    Route::controller(SubscriptionController::class)->group(function (){
        Route::get('/read-subscriptions', 'read');
        Route::post('/create-subscription', 'create');
        Route::post('/read-subscription-by-id', 'readById');
        Route::post('/read-customer-subscription', 'readByCustomerId');
    });

    //todo testimony route
    Route::controller(TestimonyController::class)->group(function (){
        Route::get('/read-testimonies', 'read');
        Route::post('/create-testimony', 'create');
        Route::post('/read-testimony-by-id', 'readById');
    });

    //todo notification route
    Route::controller(NotificationController::class)->group(function (){
        Route::get('/read-notifications', 'read');
        Route::post('/read-notification-by-id', 'readById');
        Route::post('/read-notification-by-type', 'readByCustomerType');
    });

    //todo coupon route
    Route::controller(CouponController::class)->group(function (){
        Route::get('/read-coupons', 'read');
        Route::post('/read-coupon-by-id', 'readById');
        Route::post('/create-coupon', 'create');
        Route::post('/read-by-coupon-code', 'readByCouponCode');
        Route::post('/update-coupon', 'update');
        Route::post('/delete-coupon', 'delete');
    });

    //todo productVariation route
    Route::controller(ProductVariationController::class)->group(function (){
        Route::get('/read-product-variations', 'read');
        Route::post('/create-product-variation', 'create');
        Route::post('/read-product-variation-by-id', 'readById');
        Route::post('/update-product-variation', 'update');
    });




//todo protected routes
    Route::middleware('auth:sanctum')->group(function () {
        //todo authentication protected route
        Route::controller(AuthenticationsController::class)
            ->group(function (){
                Route::post('/change-password', 'changePassword');
            });
        //todo customer protected route
        Route::controller(CustomersController::class)->group(function (){
            Route::post('/update-customer', 'update');
        });

    });
});


