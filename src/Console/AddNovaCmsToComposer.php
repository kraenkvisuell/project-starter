<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Kraenkvisuell\ProjectStarter\Facades\ComposerWriter;

class AddNovaCmsToComposer extends Command
{
    public $signature = 'ps:add-nova-cms-to-composer';

    public function handle()
    {
        $this->comment('Adding Nova CMS to composer if not yet added...');

        $writerResponse = ComposerWriter::addRequire('kraenkvisuell/nova-cms', '^1.2.5');

        $this->{$writerResponse['existed'] ? 'line' : 'info'}($writerResponse['message']);
    }
}
