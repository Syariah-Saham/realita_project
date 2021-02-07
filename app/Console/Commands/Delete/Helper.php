<?php

namespace App\Console\Commands\Delete;

use Illuminate\Console\Command;
use App\Helpers\ListFiles;
use File;

class Helper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:helper {Class Name} {-f|--force : Option for force delete without confirm.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for delete helper.';

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
        $helpers = ListFiles::get('app/Helpers/');
        $notfound = true;
        $force = $this->option('force');
        foreach ($helpers as $helper) {
            $target = $this->argument('Class Name') . '.php';
            if($target === $helper) {
                (!$force) ? $confirm = $this->confirm('Are you sure want to delete ' . $helper . '?') : '';
                if($force||$confirm) {
                    $this->info('  Delete the helper where name is ' . $helper);
                    File::delete('app/Helpers/' . $target);
                    $this->info('  Helper ' . $helper . ' deleted successfully');
                } else {
                    $this->info('  Cancel deleting ' . $helper);
                }
                $notfound = false;
            }
        }

        ($notfound) ? $this->info('   404: File Not Found!') : '';
    }
}
