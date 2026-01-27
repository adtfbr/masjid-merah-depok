<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // Gunakan Bootstrap 5 untuk pagination
        Paginator::useBootstrapFive();

        // Share bidangs to navbar for SEO-friendly slug URLs
        view()->composer('layouts.public', function ($view) {
            $bidangs = cache()->remember('navbar_bidangs', 3600, function () {
                return \App\Models\Bidang::orderBy('nama_bidang')->get(['id', 'nama_bidang', 'slug']);
            });
            $view->with('navbarBidangs', $bidangs);
        });
    }
}
