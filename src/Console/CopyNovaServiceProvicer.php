<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyNovaServiceProvicer extends Command
{
    public $signature = 'ps:copy-nova-service-provider';

    public function handle()
    {
        $this->comment('Copying NovaServiceProvicer.php...');

        
        File::copy(
            base_path('vendor/kraenkvisuell/project-starter/stubs/app/Providers/NovaServiceProvider.php'),
            base_path('app/Providers/NovaServiceProvider.php'),
        );
    }
}
