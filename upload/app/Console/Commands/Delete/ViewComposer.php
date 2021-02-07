<?php

namespace App\Console\Commands\Delete;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Helpers\ListFiles;
use File;

class ViewComposer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:view_composer {Class Name} {-f|--force : Option for force delete without confirm.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for delete view composer';

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
        $viewComposers = ListFiles::get('app/Http/View/Composers/');
        $notfound = true;
        $target =  $this->argument('Class Name');
        foreach ($viewComposers as $viewComposer) {
            $bool = Str::contains($viewComposer , $target);
            if($bool) {
                $notfound = false;
                $confirm = $this->confirm('Are u sure to delete '. $viewComposer .' ?');
                if($confirm) {
                    $this->info('   Delete the View Composer where name is ' . $viewComposer);
                    $action = File::delete('app/Http/View/Composers/' . $viewComposer);
                    $this->info('   View Composer ' . $viewComposer .' deleted succesfully');
                } else {
                    $this->info('   Cancel deleting viewComposer.');
                }
            } 
        }
        ($notfound) ? $this->info('  404: File not found!'):'';
    }
}
