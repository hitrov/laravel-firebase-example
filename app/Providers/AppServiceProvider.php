<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Repository\Interfaces\Auth::class, \App\Repository\FirebaseAuth::class);
        $this->app->singleton(
            \Kreait\Firebase\Contract\Auth::class,
            fn() => \Kreait\Laravel\Firebase\Facades\Firebase::auth(),
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
