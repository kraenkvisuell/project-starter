<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Kraenkvisuell\ProjectStarter\Facades\ComposerWriter;


class AddVaporToComposer extends Command
{
    public $signature = 'ps:add-vapor-to-composer';

    public function handle()
    {
        $this->comment('Adding vapor core to composer if not yet added...');
        
        $writerResponse = ComposerWriter::addRequire('laravel/vapor-core', '^2.10');

        $this->{$writerResponse['existed'] ? 'line' : 'info'}($writerResponse['message']);
    }
}
