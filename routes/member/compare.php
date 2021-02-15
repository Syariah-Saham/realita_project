<?php 

use App\Http\Controllers\Member\CompareController;

Route::prefix('compare')->group(function() {
	Route::get('/' , [CompareController::class , 'index']);
	Route::get('find' , [CompareController::class , 'compare']);
});