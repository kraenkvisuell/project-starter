<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyRoutes extends Command
{
    public $signature = 'ps:copy-routes';

    public function handle()
    {
        $this->comment('Copying routes/web.php...');

        
        File::copy(
            base_path('vendor/kraenkvisuell/project-starter/stubs/routes/web.php'),
            base_path('routes/web.php'),
        );
    }
}
