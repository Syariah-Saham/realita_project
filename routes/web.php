<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class , 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	if(Auth::user()->role_id === 1) {
		return redirect('admin/dashboard');
	} else {
	    return redirect('member/dashboard');
	}
	    // return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->group(function() {

	// Administrator
	Route::name('admin')->middleware('role_admin')->prefix('admin')->group(function() {
		include
		__DIR__.'/admin/dashboard.php';

		include
		__DIR__.'/admin/member.php';

		include
		__DIR__.'/admin/admin.php';

		include
		__DIR__.'/admin/stock.php';

		include
		__DIR__.'/admin/report.php';

		include 
		__DIR__.'/admin/sector.php';

		include
		__DIR__.'/admin/industry.php';

		include
		__DIR__.'/admin/package.php';

		include
		__DIR__.'/admin/bank.php';

		include
		__DIR__.'/admin/periode.php';

		include
		__DIR__.'/admin/import.php';
	});


	// member
	Route::name('member')->middleware('role_member')->prefix('member')->group(function() {
		include
		__DIR__.'/member/dashboard.php';

		include
		__DIR__.'/member/report.php';

		include
		__DIR__.'/member/compare.php';

		include
		__DIR__.'/member/screening.php';
	});
});