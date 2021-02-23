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

        $this->comment('run migrations...');
        $this->call('migrate');

        $this->call('nova:install');

        $this->call('cms:init');
    }
}
