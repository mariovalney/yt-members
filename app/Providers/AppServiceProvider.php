<?php

namespace App\Providers;

use Config;
use URL;
use View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View composers
        View::composer(
            'layouts.*', \App\Http\View\Composers\BodyClassComposer::class
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // If using HTTPS on local
        if (Config::get('app.env') === 'local') {
            $app_schema = parse_url(Config::get('app.url'));

            if (($app_schema['scheme'] ?? '') !== 'https') {
                return;
            }
        }

        URL::forceScheme('https');
        request()->server->set('HTTPS', true);
    }
}
