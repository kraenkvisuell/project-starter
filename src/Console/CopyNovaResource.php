<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyNovaResource extends Command
{
    public $signature = 'ps:copy-nova-resource';

    public function handle()
    {
        $this->comment('Copying Nova/Resource.php...');

        
        File::copy(
            base_path('vendor/kraenkvisuell/project-starter/stubs/app/Nova/Resource.php'),
            base_path('app/Nova/Resource.php'),
        );
    }
}
