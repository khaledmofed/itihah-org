<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        view()->composer('*', function ($view) {
            try {
                $settings = Setting::all()->pluck('value', 'key');
                $view->with('siteSettings', $settings);
            } catch (\Exception $e) {
                $view->with('siteSettings', collect());
            }
        });
    }
}
