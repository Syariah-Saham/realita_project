<?php

namespace App\Console\Commands\Delete;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Helpers\ListFiles;
use File;

class View extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:view {File Name} {directory=root}  {-f|--force : Option for force delete without confirm.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for delete views';

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
        $dir = ($this->argument('directory') !== 'root') ? $this->argument('directory') : '';
        $views = ListFiles::get('resources/views/' . $dir);

        $notfound = true;
        $target =  $this->argument('File Name');
        foreach ($views as $view) {
            $bool = Str::contains($view , $target);
            if($bool) {
                $notfound = false;
                $confirm = $this->confirm('Are u sure to delete '. $view .' ?');
                if($confirm) {
                    $this->info('   Delete the view where name is ' . $view);
                    $action = File::delete('resources/views/' . $dir .'/' . $view);
                    $this->info('   view ' . $view .' deleted succesfully');
                } else {
                    $this->info('   Cancel deleting view.');
                }
            } 
        }
        ($notfound) ? $this->info('  404: File not found!'):'';
    }
}
