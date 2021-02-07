<?php

namespace App\Console\Commands\Delete;

use Illuminate\Console\Command;
use App\Helpers\ListFiles;
use File;

class Storage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:storage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This method for delete file in storage';

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
        function delFile($array , $path) {
            foreach($array as $file) {
                dump('Delete File => ' . $path . $file);
                File::delete($path.$file);
            }
        }

        $ns = 'storage/app/public/';
        $cns = $ns.'theory/covers/';
        $tcovers = ListFiles::get($cns);
        delFile($tcovers , $cns);

        $dns = $ns.'theory/documents/';
        $tdocs = ListFiles::get($dns);
        delFile($tdocs , $dns);
        return 0;
    }
}
