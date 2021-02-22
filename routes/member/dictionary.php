<?php 

use App\Http\Controllers\Member\DictionaryController;

Route::prefix('dictionary')->group(function() {
	Route::get('/' , [DictionaryController::class , 'index']);
});