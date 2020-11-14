<?php

namespace Proxeuse\FortifyUITabler;

use Illuminate\Support\ServiceProvider;
use Proxeuse\FortifyUITabler\Commands\FortifyUITablerCommand;

class FortifyUITablerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../stubs/resources/views' => base_path('resources/views'),
                __DIR__ . '/../stubs/public' => base_path('public'),
                __DIR__ . '/../stubs/lang' => base_path('resources/lang'),
            ], 'fortify-ui-tabler-resources');

            $this->commands([
                FortifyUITablerCommand::class,
            ]);
        }
    }
}
