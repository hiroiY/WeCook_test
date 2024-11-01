<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\UrlGenerator;
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
<<<<<<< HEAD
    public function boot(): void
    {
        //
=======
    public function boot(UrlGenerator $url): void
    {
        Paginator::useBootstrap();
        if (env('APP_ENV') !== 'local') {
            $url->forceScheme('https');
        }
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    }
}
