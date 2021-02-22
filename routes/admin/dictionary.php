<?php

use App\Http\Controllers\Admin\DictionaryController;

Route::prefix('dictionary')->group(function() {
	Route::get('/' , [DictionaryController::class , 'index']);
	Route::post('' , [DictionaryController::class , 'store']);
	Route::put('/update' , [DictionaryController::class , 'update']);
	Route::delete('/{dictionary}' , [DictionaryController::class , 'destroy']);
});