<?php 

use App\Http\Controllers\Admin\ImportDataController;

Route::prefix('import')->group(function() {
	Route::get('/' , [ImportDataController::class , 'index']);
	Route::post('/stock' , [ImportDataController::class , 'stock']);
	Route::delete('/stock' , [ImportDataController::class , 'stockReset']);
	Route::post('report' , [ImportDataController::class , 'financeReport']);
	Route::put('maintenance' , [ImportDataController::class , 'maintenance']);
});