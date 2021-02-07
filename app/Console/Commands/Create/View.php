<?php

namespace App\Console\Commands\Create;

use Illuminate\Console\Command;

class View extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:view {Class Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for create view';

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
     * @return mixed
     */
    public function handle()
    {
        $fileName = $this->argument('Class Name');
        file_put_contents('resources/views/' . $fileName . '.blade.php', '');
        $this->info($fileName . '.blade.php created successfully');
    }
}
