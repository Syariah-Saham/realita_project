<?php 

use App\Http\Controllers\Member\ScreeningController;

Route::prefix('screening')->group(function() {
	Route::get('/' , [ScreeningController::class , 'index']);
});