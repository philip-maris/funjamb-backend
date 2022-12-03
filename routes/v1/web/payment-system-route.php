<?php


use App\Models\V1\PaymentSystem;
use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\V1\Web\PaymentSystemController::class)->group(function (){
    Route::get("/dashboard/payment-systems", "index")->name("paymentSystems");
    Route::get("/dashboard/create-payment-system", "show")->name("createPaymentSystem");
    Route::post("/dashboard/create-payment-system", "store")->name("createPaymentSystem");
    Route::post("/dashboard/create-payment-system/{paymentSystemId}", "edit")->name("editPaymentSystem");
    Route::post("/dashboard/create-payment-system", "store")->name("updatePaymentSystem");
    Route::get("/dashboard/payment-system/{paymentSystemId}", "delete")->name("deletePaymentSystem");
});
