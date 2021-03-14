<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;

class Start extends Command
{
    public $signature = 'ps:start';

    public function handle()
    {
        $this->comment('run migrations...');

        $this->call('migrate');

        $this->call('nova:install');

        $this->call('nova:publish');

        $this->call('config:clear');

        $this->call('migrate');

        $this->call('cms:init');

        $this->call('cms:force-mix');

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
