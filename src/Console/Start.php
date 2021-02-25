<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;

class Start extends Command
{
    public $signature = 'ps:start';

    public function handle()
    {
        $this->call('ps:add-nova-to-composer');

        $this->call('ps:add-nova-cms-to-composer');

        $this->call('ps:add-ray-to-composer');

        $this->comment('run composer update...');
        shell_exec('composer update');

        $this->call('ps:publish-third-parties');

        $this->comment('run migrations...');
        $this->call('migrate');

        $this->call('nova:install');

        $this->call('ps:copy-nova-service-provider');

        $this->call('ps:copy-routes');

        $this->call('cms:init');

        $this->call('cms:use-theme', [
            'theme' => 'default'
        ]);

        $this->comment('creating storage link...');
        if(!is_link(base_path('public/storage'))) {
            $this->call('storage:link');
        } else {
            $this->line('storage link already created.');
        }
        
        $this->comment('run yarn...');
        shell_exec('yarn');
        
        $this->comment('run mix...');
        shell_exec('npm run development');
    }
}
