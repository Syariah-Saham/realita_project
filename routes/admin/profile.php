<?php 

use App\Http\Controllers\Admin\ProfileController;

Route::prefix('profile')->group(function() {
	 Route::get('/' , [ProfileController::class , 'index']);
});