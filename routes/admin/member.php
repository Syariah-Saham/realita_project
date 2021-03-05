<?php 

use App\Http\Controllers\Admin\MemberController;

Route::prefix('member')->group(function() {
	Route::get('/' , [MemberController::class , 'index']);
	Route::put('{member}/status' , [MemberController::class , 'status']);
	Route::delete('{member}' , [MemberController::class , 'destroy']);
});