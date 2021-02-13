<?php 

use App\Http\Controllers\Admin\IndustryController;

Route::prefix('industry')->group(function() {
	Route::get('/create' , [IndustryController::class , 'create']);
	Route::post('/create' , [IndustryController::class , 'store']);
	Route::delete('/{industry}' , [IndustryController::class , 'destroy']);
});