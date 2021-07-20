<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\Role;
use App\Models\User;
use App\Models\PeriodeReport;
use App\Models\Statistic;
use App\Models\Package;
use App\Models\Setting;

use App\Helpers\UpdateScreening;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('generate' , function() {
	Role::create([ 'role' => 'admin' ]);
	Role::create([ 'role' => 'member' ]);

	User::create([
		'role_id'  => 1,
		'name'     => 'admin',
		'email'    => 'admin@email.com',
		'password' => Hash::make('admin123'),
	]);

	PeriodeReport::create(['year' => '2015']);
	PeriodeReport::create(['year' => '2016']);
	PeriodeReport::create(['year' => '2017']);
	PeriodeReport::create(['year' => '2018']);
	PeriodeReport::create(['year' => '2019']);
});

Artisan::command('statistic' , function() {
	$packages = Package::get();
	$data = [];
	foreach($packages as $package) {
		array_push($data, $package->member->count());
	}
	
	Statistic::create([
		'day'      => date('d'),
		'month'    => date('m'),
		'year'     => date('Y'),
		'free'     => $data[0],
		'personal' => $data[1],
		'expert'   => $data[2],
	]);
});


Artisan::command('maintenance' , function() {
	Setting::create([
		'key' => 'maintenance',
		'value' => 'true',
	]);

});


Artisan::command('logging' , function() {
	Log::info('Update Finance Report 2021 for screening');
	Log::alert('Alert: Update finance report 2021 for screening');
	Log::debug('Debug: Update finance report 2021 for screening');
	Log::notice('Notice: Update finance report 2021 for screening');

	Log::channel('screening')->info('This is testing for import screening');
});

Artisan::command('update_screening' , function() {
	Log::channel('screening')->info('Import Screening for sheet');
	
	/* Import data from sheet */
	UpdateScreening::index();
});
