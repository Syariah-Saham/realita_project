<?php 

use App\Http\Controllers\Member\PackageController;

Route::prefix('package')->group(function() {
	Route::get('/' , [PackageController::class , 'index']);
	Route::get('/{package}/xendit' , [PackageController::class , 'xendit']);
	Route::get('/{package}/xendit/purchase' , [PackageController::class , 'purchase']);

	Route::get('/{package}/buy' , [PackageController::class , 'buy']);
	Route::post('/{package}/send' , [PackageController::class , 'send']);
	Route::get('/{payment}/download' , [PackageController::class , 'download']);

});