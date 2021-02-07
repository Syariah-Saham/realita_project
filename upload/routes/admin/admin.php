<?php 

use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->group(function() {
	Route::get('/' , [AdminController::class , 'index']);
	Route::get('add' , [AdminController::class , 'create']);
	Route::post('/' , [AdminController::class , 'store']);
	Route::delete('/{id}' , [AdminController::class , 'destroy']);
});