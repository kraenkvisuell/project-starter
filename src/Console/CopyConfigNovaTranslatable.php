<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyConfigNovaTranslatable extends Command
{
    public $signature = 'ps:copy-config-nova-translatable';

    public function handle()
    {
        $this->comment('Copying config/nova-translatable.php...');

        File::copy(
            base_path('vendor/kraenkvisuell/project-starter/stubs/config/nova-translatable.php'),
            base_path('config/nova-translatable.php'),
        );
    }
}
