<?php

namespace Kraenkvisuell\ProjectStarter\Console;

use Illuminate\Console\Command;

class PublishThirdParties extends Command
{
    public $signature = 'ps:publish-third-parties';

    public function handle()
    {
        $this->comment('Publishing third party packages...');

        if (!config('nova-media-library')) {
            $this->call('vendor:publish', [
                '--provider' => 'Kraenkvisuell\NovaCmsMedia\ToolServiceProvider'
            ]);
            $this->info('Published nova-media-library.');
        } else {
            $this->line('nova-media-library already published.');
        }

        if (!config('nova-translatable')) {
            $this->call('vendor:publish', [
                '--tag' => 'nova-translatable-config'
            ]);
            $this->info('Published nova-translatable.');
        } else {
            $this->line('nova-translatable already published.');
        }
    }
}
