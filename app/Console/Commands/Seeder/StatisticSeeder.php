<?php

namespace App\Console\Commands\Seeder;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Member;
use App\Models\Package;
use App\Models\Statistic;

class StatisticSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:statistic {value=5} {day=2} {month=1} {year=2021}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeder Statistic';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = Faker::create('id_ID');
        echo "\n";

        $progressbar = $this->output->createProgressBar($this->argument('value'));

        for($i = 0 ; $i<$this->argument('value') ; $i++) {
            User::create([
                'name'              => $faker->name,
                'email'             => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password'          => Hash::make('member123'),
                'remember_token'    => Str::random(10),
            ]);

            Member::create([
                'user_id'    => User::get()->last()->id,
                'package_id' => $faker->randomElements([1,3,4])[0],
            ]);

            $progressbar->advance();
        }

        $packages = Package::get();
        $data = [];
        foreach ($packages as $package) {
            array_push($data, $package->member->count());
        }

        Statistic::create([
            'day'      => $this->argument('day'),
            'month'    => $this->argument('month'),
            'year'     => $this->argument('year'),
            'free'     => $data[0],
            'personal' => $data[1],
            'expert'   => $data[2],
        ]);

        $progressbar->finish();

        echo "\n\n";
    }
}
