<?php 


use App\Http\Controllers\Admin\DashboardController;

Route::get('/dashboard' , [DashboardController::class , 'index']);