<?php 

use App\Http\Controllers\Member\DashboardController;

Route::get('dashboard' , [DashboardController::class , 'index']);
Route::post('dashboard' , [DashboardController::class , 'addWatchlist']);
Route::delete('dashboard/{watchlist}' , [DashboardController::class , 'destroy']);