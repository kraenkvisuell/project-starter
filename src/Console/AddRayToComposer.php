<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Kraenkvisuell\ProjectStarter\Facades\ComposerWriter;

class AddRayToComposer extends Command
{
    public $signature = 'ps:add-ray-to-composer';

    public function handle()
    {
        $this->comment('Adding Ray to composer if not yet added...');

        $writerResponse = ComposerWriter::addRequire('spatie/laravel-ray', '^1.3');

        $this->{$writerResponse['existed'] ? 'line' : 'info'}($writerResponse['message']);
    }
}
