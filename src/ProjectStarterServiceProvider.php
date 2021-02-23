<?php

namespace Kraenkvisuell\ProjectStarter;

use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\ProjectStarter\Console\Start;
use Kraenkvisuell\ProjectStarter\Console\AddRayToComposer;
use Kraenkvisuell\ProjectStarter\Console\AddNovaToComposer;
use Kraenkvisuell\ProjectStarter\Console\AddNovaCmsToComposer;

class ProjectStarterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Start::class,
                AddNovaToComposer::class,
                AddRayToComposer::class,
                AddNovaCmsToComposer::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('composer-writer', function () {
            return new ComposerWriter();
        });
    }
}
