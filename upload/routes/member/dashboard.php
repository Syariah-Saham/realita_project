<?php 

use App\Http\Controllers\Member\DashboardController;

Route::get('dashboard' , [DashboardController::class , 'index']);