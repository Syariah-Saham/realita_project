<?php 

use App\Http\Controllers\Admin\ImportDataController;

Route::prefix('import')->group(function() {
	Route::get('/' , [ImportDataController::class , 'index']);
	Route::post('/stock' , [ImportDataController::class , 'stock']);
	Route::post('report' , [ImportDataController::class , 'financeReport']);
});