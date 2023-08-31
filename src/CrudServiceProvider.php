<?php

namespace Ayat\Crud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views/', 'package');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes(
            [
                __DIR__.'/routes/web.php'      => base_path('routes/crud.php'),
                __DIR__.'/resources/views'     => resource_path('views/ayat/crud'),
                __DIR__.'/Http/Controllers'    => app_path('Http/Controllers/ayat/crud'),
                __DIR__.'/Models'              => app_path('Models/ayat/crud'),
                __DIR__.'/database/migrations' => base_path('database/migrations'),
            ],
            'ayat-crud'
        );
    }
}
