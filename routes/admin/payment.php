<?php 

use App\Http\Controllers\Admin\PaymentController;

Route::prefix('payment')->group(function() {
	Route::get('/' , [PaymentController::class , 'index']);
	Route::get('/{payment}' , [PaymentController::class , 'show']);
	Route::get('/{payment}/proof' , [PaymentController::class , 'proof']);
	Route::put('/{payment}/status' , [PaymentController::class , 'update']);
});