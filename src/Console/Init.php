<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;

class Init extends Command
{
    public $signature = 'ps:init';

    public function handle()
    {
        $this->call('ps:add-nova-to-composer');

        $this->call('ps:add-nova-cms-to-composer');

        $this->call('ps:add-ray-to-composer');

        $this->call('ps:add-vapor-to-composer');

        $this->call('ps:add-aws-to-composer');

        $this->comment('run composer update...');
        shell_exec('composer update');

        $this->call('ps:copy-config-app');

        $this->call('ps:copy-config-nova-translatable');

        $this->call('ps:copy-env');

        $this->call('ps:copy-routes');

        $this->call('ps:copy-nova-service-provider');
    }
}
