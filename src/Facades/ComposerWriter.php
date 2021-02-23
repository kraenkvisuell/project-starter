<?php

namespace Kraenkvisuell\ProjectStarter\Facades;

use Illuminate\Support\Facades\Facade;

class ComposerWriter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'composer-writer';
    }
}
