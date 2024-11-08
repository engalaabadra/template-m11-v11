<?php
use Modules\Wallet\Http\Controllers\API\WalletController;
use Illuminate\Support\Facades\Route;


Route::resource('wallets', WalletController::class)->only(['index','store']);

