<?php 

use App\Http\Controllers\Member\ReportController;

Route::prefix('report')->group(function() {
	Route::get('/' , [ReportController::class , 'index']);
});