<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {
        // Carbon'un yerel ayarını Türkçe olarak ayarlayın
        Carbon::setLocale('tr');
    }

    /**
     * Bootstrap any application services.
     */

}
