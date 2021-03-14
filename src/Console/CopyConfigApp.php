<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyConfigApp extends Command
{
    public $signature = 'ps:copy-config-app';

    public function handle()
    {
        $this->comment('Copying config/app.php...');

        File::copy(
            base_path('vendor/kraenkvisuell/project-starter/stubs/config/app.php'),
            base_path('config/app.php'),
        );
    }
}
