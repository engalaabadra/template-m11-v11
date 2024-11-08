<?php

use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\API\User\PaymentMethodController;
use Modules\Payment\Http\Controllers\API\User\PaymentController;

Route::middleware(['auth:api','role:user'])->group(function(){
    Route::resource('payments', PaymentResourceController::class)->only(['index']);
    Route::get('payments/pay-reservation/{reservationId}/reference/{referencePaymentId}',[PaymentController::class,'paidReservation'])->name('api.payments.paid-reservation');

});

Route::get('/reservations/{id}/payment/callback',[PaymentController::class,'callback'])->name('api.payments.callback');
Route::get('wallet/{id}/payment/callback-wallet/price/{price}',[PaymentController::class,'callbackWallet'])->name('api.payments.callback-wallet');
Route::get('/payments/status-tap/{tapId}',[PaymentController::class,'statusTap'])->name('api.payments.status-tap');

