<?php

namespace JlTwc\JlLaravelExtras\Providers;

use Illuminate\Support\ServiceProvider;
use JlTwc\JlLaravelExtras\Console\Commands\MakeAdvancedCommand;
use JlTwc\JlLaravelExtras\Console\Commands\MakeEnumCommand;
use JlTwc\JlLaravelExtras\Console\Commands\MakeRepositoryCommand;
use JlTwc\JlLaravelExtras\Console\Commands\MakeServiceCommand;

class JlTwcProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../stubs/advancedcommand.stub' => 'stubs/advancedcommand.stub',
            __DIR__.'/../stubs/enum.stub' => 'stubs/enum.stub',
            __DIR__.'/../stubs/repository.stub' => 'stubs/repository.stub',
            __DIR__.'/../stubs/service.stub' => 'stubs/service.stub',
        ], 'custom-stubs');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeAdvancedCommand::class,
                MakeEnumCommand::class,
                MakeRepositoryCommand::class,
                MakeServiceCommand::class,
            ]);
        }
    }
}