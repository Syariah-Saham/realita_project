<?php 

use App\Http\Controllers\Admin\MemberController;

Route::prefix('member')->group(function() {
	Route::put('{member}/status' , [MemberController::class , 'status']);
});