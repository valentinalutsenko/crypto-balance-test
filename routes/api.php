<?php

use App\Http\Controllers\CryptoBalance\CryptoBalanceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->controller(CryptoBalanceController::class)->group(static function (): void {
    Route::post('crypto/top-up', 'topUpBalance')->name('crypto.topup');
    Route::post('crypto/withdraw', 'withdrawBalance')->name('crypto.withdraw');
});
