<?php
use Modules\Payment\Http\Controllers\PaymentController;
Route::get('payments/form/{price}/{reservationId}/{user}',[PaymentController::class,'paymentProccessFinishing'])->name('payments.form');
