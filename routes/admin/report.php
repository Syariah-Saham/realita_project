<?php 

use App\Http\Controllers\Admin\ReportController;

Route::prefix('report')->group(function() {
	Route::get('/' , [ReportController::class , 'index']);
	Route::get('create' , [ReportController::class , 'create']);
	Route::post('create' , [ReportController::class , 'store']);
	Route::get('search' , [ReportController::class , 'find']);
	Route::delete('/{report}' , [ReportController::class , 'destroy']);
});