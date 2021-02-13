<?php 

use App\Http\Controllers\Admin\SectorController;

Route::prefix('sector')->group(function() {
	Route::get('create' , [SectorController::class , 'create']);
	Route::post('/create' , [SectorController::class , 'store']);
	Route::delete('/{sector}' , [SectorController::class , 'destroy']);
});