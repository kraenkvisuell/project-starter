<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Kraenkvisuell\ProjectStarter\Facades\ComposerWriter;


class AddNovaToComposer extends Command
{
    public $signature = 'ps:add-nova-to-composer';

    public function handle()
    {
        $this->comment('Adding Nova to composer if not yet added...');
        
        $writerResponse = ComposerWriter::addRepository([
            'type' => 'composer',
            'url' => 'https://nova.laravel.com'
        ]);
        
        $this->{$writerResponse['existed'] ? 'line' : 'info'}($writerResponse['message']);
        

        $writerResponse = ComposerWriter::addRequire('laravel/nova', '~3.0');

        $this->{$writerResponse['existed'] ? 'line' : 'info'}($writerResponse['message']);
    }
}
