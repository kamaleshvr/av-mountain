<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            // Share theme with all views using View::share
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $theme = \App\Models\Setting::firstOrCreate(['key' => 'theme'], ['value' => 'theme-gold'])->value;
                \Illuminate\Support\Facades\View::share('activeTheme', $theme);
            }
        } catch (\Exception $e) {
            // Handle migration not run yet
        }
    }
}
