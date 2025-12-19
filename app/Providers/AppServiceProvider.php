<?php

namespace App\Providers;

use App\Services\ThongBao;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // class, service
        // $this->app->bind('ThongBaoT', function() {
        //     return new ThongBao();
        // });

        $this->app->singleton('ThongBaoT', function() {
            return new ThongBao();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
