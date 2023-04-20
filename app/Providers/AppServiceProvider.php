<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CmsLayout;

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
    public function boot(): void
    {
        view()->share('layout',
            CmsLayout::first());
    }
}
