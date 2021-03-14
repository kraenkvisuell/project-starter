<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;
use Kraenkvisuell\ProjectStarter\Facades\ComposerWriter;


class AddAwsToComposer extends Command
{
    public $signature = 'ps:add-aws-to-composer';

    public function handle()
    {
        $this->comment('Adding aws flysystem to composer if not yet added...');
        
        $writerResponse = ComposerWriter::addRequire('league/flysystem-aws-s3-v3', '~1.0');

        $this->{$writerResponse['existed'] ? 'line' : 'info'}($writerResponse['message']);
    }
}
