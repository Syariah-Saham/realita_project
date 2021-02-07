<?php

namespace App\Console\Commands\Delete;

use Illuminate\Console\Command;
use App\Helpers\ListFiles;
use File;

class Model extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:model {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for delete model';

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
        $models = ListFiles::get('app/models');
        $notfound = true;
        foreach ($models as $model) {
            $target = $this->argument('class').'.php';
            if($target === $model) {
                $this->info('   delete the model where name is ' . $target);
                File::delete('app/Models/' . $target);
                $this->info('   model ' . $target . ' deleted successfully');
                $notfound = false;
            }
        }
        ($notfound) ? $this->info('   404 : File Not Found!'): '';
    }
}
