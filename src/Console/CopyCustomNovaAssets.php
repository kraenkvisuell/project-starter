<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyCustomNovaAssets extends Command
{
    public $signature = 'ps:copy-custom-nova-assets';

    public function handle()
    {
        $this->comment('Copying custom Nova assets...');

        
        File::copy(
            base_path('vendor/kraenkvisuell/project-starter/stubs/resources/views/vendor/nova/partials/meta.blade.php'),
            base_path('resources/views/vendor/nova/partials/meta.blade.php'),
        );

        if (!is_dir(base_path('public/img'))) {
            mkdir(base_path('public/img'));
        }

        if (!is_dir(base_path('public/img/nova'))) {
            mkdir(base_path('public/img/nova'));
        }

        File::copy(
            base_path('vendor/kraenkvisuell/project-starter/stubs/public/img/nova/favicon-nova.png'),
            base_path('public/img/nova/favicon-nova.png'),
        );
    }
}
