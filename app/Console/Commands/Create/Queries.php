<?php

namespace App\Console\Commands\Create;

use Illuminate\Console\Command;

class Queries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:query {class} {--M|--method= : Default method in helper class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for create queries';

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
        $fileName = $this->argument('class');
        $dir = 'App/Queries';
        $method = ($this->option('method')) ? $this->option('method') : 'index';
        $content = '<?php 
namespace App\Queries;

class '. $fileName .'
{
    public static function '. $method .'()
    {
        // code
    }
}
';
        (!is_dir($dir))  ? mkdir($dir) :'';

        file_put_contents($dir .'/'. $fileName .'.php' , $content);
        $this->info($fileName . ' Query created succesfully');
    }
}
