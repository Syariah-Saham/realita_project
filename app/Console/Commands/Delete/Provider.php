<?php

namespace App\Console\Commands\Delete;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Helpers\ListFiles;
use File;

class Provider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:provider {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for delete provider.';

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
        $providers = ListFiles::get('app/Providers');
        $notfound = true;
        $target =  $this->argument('class');
        
        foreach ($providers as $provider) {
            $bool = Str::contains($provider , $target);
            if($bool) {
                $notfound = false;
                $confirm = $this->confirm('Are u sure to delete '. $provider .' ?');
                if($confirm) {
                    $this->info('   Delete the provider where name is ' . $provider);
                    $action = File::delete('app/Providers/' . $provider);
                    $this->info('   provider ' . $provider .' deleted succesfully');
                } else {
                    $this->info('   Cancel deleting provider.');
                }
            } 
        }
        ($notfound) ? $this->info('   404 : File Not Found!'): '';
    }
}
