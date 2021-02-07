<?php

namespace App\Console\Commands\Create;

use Illuminate\Console\Command;

class ViewComposer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:view_composer {class} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for create View Composer';

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
        $fileName = $this->argument('class');
        $dir = 'app/Http/View/Composers';
        $content = '<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class '. $fileName .'
{
    public function compose(View $view)
    {
        $view->with("key" , "value");
    }
}
        ';

        // dd($dir);
        (!is_dir($dir)) ? mkdir('app/Http/View/Composers') : '';
        file_put_contents($dir . '/'. $fileName .'.php' , $content);
        $this->info($fileName . ' View Composer created successfully');
    }
}
