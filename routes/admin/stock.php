<?php 

use App\Http\Controllers\Admin\StockController;

Route::prefix('stock')->group(function() {
	Route::get('/' , [StockController::class , 'index']);
	Route::get('/create' , [StockController::class , 'create']);
	Route::post('/create' , [StockController::class , 'store']);
	Route::delete('/{stock}' , [StockController::class , 'destroy']);
});