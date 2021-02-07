<?php

namespace App\Console\Commands\Delete;

use Illuminate\Console\Command;
use App\Helpers\ListFiles;
use File;

class Query extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:query {Class Name} {-f|--force : Option for force delete without confirm.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for delete query';

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
        $queries = ListFiles::get('app/Queries/');
        $notfound = true;
        $force = $this->option('force');
        foreach ($queries as $query) {
            $target = $this->argument('Class Name') . '.php';
            if($target === $query) {
                (!$force) ? $confirm = $this->confirm('Are you sure want to delete ' . $query . '?') : '';
                if($force||$confirm) {
                    $this->info('  Delete the query where name is ' . $query);
                    File::delete('app/Queries/' . $target);
                    $this->info('  Query ' . $query . ' deleted successfully');
                } else {
                    $this->info('  Cancel deleting ' . $query);
                }
                $notfound = false;
            }
        }

        ($notfound) ? $this->info('   404: File Not Found!') : '';
    }
}
