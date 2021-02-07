<?php

namespace App\Console\Commands\Delete;

use Illuminate\Console\Command;
use App\Helpers\ListFiles;
use Illuminate\Support\Str;
use File;

class Migration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:migration {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for delete migration';

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
        $migrations = ListFiles::get('database/migrations');
        $notfound = true;
        $target =  $this->argument('class');
        foreach ($migrations as $migration) {
            $bool = Str::contains($migration , $target);
            if($bool) {
                $notfound = false;
                $confirm = $this->confirm('Are u sure to delete '. $migration .' ?');
                if($confirm) {
                    $this->info('   Delete the migration where name is ' . $migration);
                    $action = File::delete('database/migrations/' . $migration);
                    $this->info('   Migration ' . $migration .' deleted succesfully');
                } else {
                    $this->info('   Cancel deleting migration.');
                }
            } 
        }
        ($notfound) ? $this->info('  404: File not found!'):'';
    }
}
