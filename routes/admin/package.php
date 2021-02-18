<?php 

use App\Http\Controllers\Admin\PackageController;

Route::prefix('package')->group(function() {
	Route::get('/' , [PackageController::class , 'index']);
	Route::get('/create' , [PackageController::class , 'create']);
	Route::post('/create' , [PackageController::class , 'store']);
	Route::delete('{package}' , [PackageController::class , 'destroy']);
	Route::get('/{package}/edit' , [PackageController::class , 'edit']);
	Route::put('/{package}' , [PackageController::class , 'update']);
});