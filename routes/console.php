<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

use App\Models\Role;
use App\Models\User;
use App\Models\PeriodeReport;

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
		'status'   => 'confirmed',
	]);

	PeriodeReport::create(['year' => '2015']);
	PeriodeReport::create(['year' => '2016']);
	PeriodeReport::create(['year' => '2017']);
	PeriodeReport::create(['year' => '2018']);
	PeriodeReport::create(['year' => '2019']);
});
