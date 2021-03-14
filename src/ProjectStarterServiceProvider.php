<?php

namespace Kraenkvisuell\ProjectStarter;

use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\ProjectStarter\Console\Init;
use Kraenkvisuell\ProjectStarter\Console\Start;
use Kraenkvisuell\ProjectStarter\Console\CopyEnv;
use Kraenkvisuell\ProjectStarter\Console\CopyRoutes;
use Kraenkvisuell\ProjectStarter\Console\AddAwsToComposer;
use Kraenkvisuell\ProjectStarter\Console\AddRayToComposer;
use Kraenkvisuell\ProjectStarter\Console\AddNovaToComposer;
use Kraenkvisuell\ProjectStarter\Console\AddVaporToComposer;
use Kraenkvisuell\ProjectStarter\Console\PublishThirdParties;
use Kraenkvisuell\ProjectStarter\Console\AddNovaCmsToComposer;
use Kraenkvisuell\ProjectStarter\Console\CopyNovaServiceProvicer;

class ProjectStarterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Init::class,
                Start::class,
                CopyEnv::class,
                CopyRoutes::class,
                AddRayToComposer::class,
                AddAwsToComposer::class,
                AddNovaToComposer::class,
                AddVaporToComposer::class,
                PublishThirdParties::class,
                AddNovaCmsToComposer::class,
                CopyNovaServiceProvicer::class,
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
