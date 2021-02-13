<?php 

use App\Http\Controllers\Admin\PeriodeController;

Route::prefix('periode')->group(function() {
	Route::get('/create' , [PeriodeController::class , 'create']);
	Route::post('create' , [PeriodeController::class , 'store']);
	Route::delete('/{periode}' , [PeriodeController::class , 'destroy']);
});