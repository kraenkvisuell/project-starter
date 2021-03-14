<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyEnv extends Command
{
    public $signature = 'ps:copy-env';

    public function handle()
    {
        $this->comment('Copying .env...');

        $projectName = substr(base_path(), strrpos(base_path(), '/') + 1);

        $envContent = file_get_contents(base_path('.env'));

        if (stristr($envContent, $projectName)) {
            $this->line('.env already copied.');
        } else {
            File::copy(
                base_path('vendor/kraenkvisuell/project-starter/stubs/.env'),
                base_path('.env'),
            );

            $envContent = file_get_contents(base_path('.env'));
            
            $envContent = str_replace('{projectslug}', $projectName, $envContent);
            $envContent = str_replace('{projectname}', Str::studly($projectName), $envContent);

            file_put_contents(base_path('.env'), $envContent);
        }
    }
}
