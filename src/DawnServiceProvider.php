<?php

namespace Asciito\LaravelDawn;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DawnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->environment('production')) {
            Route::group(array_filter([
                'prefix' => config('dawn.path', '_dawn'),
                'domain' => config('dawn.domain', null),
                'middleware' => config('dawn.middleware', 'web'),
            ]), function () {
                Route::get('/login/{userId}/{guard?}', [
                    'uses' => 'Asciito\LaravelDawn\Http\Controllers\UserController@login',
                    'as' => 'dawn.login',
                ]);

                Route::get('/logout/{guard?}', [
                    'uses' => 'Asciito\LaravelDawn\Http\Controllers\UserController@logout',
                    'as' => 'dawn.logout',
                ]);

                Route::get('/user/{guard?}', [
                    'uses' => 'Asciito\LaravelDawn\Http\Controllers\UserController@user',
                    'as' => 'dawn.user',
                ]);
            });
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\InstallCommand::class,
                Console\DawnCommand::class,
                Console\DawnFailsCommand::class,
                Console\MakeCommand::class,
                Console\PageCommand::class,
                Console\PurgeCommand::class,
                Console\ComponentCommand::class,
                Console\ChromeDriverCommand::class,
            ]);
        }
    }
}
