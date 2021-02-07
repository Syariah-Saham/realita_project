<?php

namespace App\Console\Commands\Rename;

use Illuminate\Console\Command;
use File;

class Helper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rename:helper {from} {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command for rename helper';

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
        $from = $this->argument('from');
        $to = $this->argument('to');
        $fromPath = app_path('Helpers/' . $from .'.php');
        $toPath = app_path('Helpers/' . $to .'.php');

        $content = File::get($fromPath);
        $newContent = str_replace('class ' . $from , 'class ' . $to, $content);
        
        File::delete($fromPath);
        file_put_contents($toPath, $newContent);
    }
}
