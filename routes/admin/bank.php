<?php 

use App\Http\Controllers\Admin\BankController;

Route::prefix('bank')->group(function() {
	Route::get('/' , [BankController::class , 'index']);
	Route::post('/' , [BankController::class , 'store']);
	Route::delete('/{bank}' , [BankController::class , 'destroy']);
});