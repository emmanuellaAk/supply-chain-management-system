<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Customer;
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
    // public function boot(): void
    // {
    //     //
    // }

    // In a service provider (e.g., AppServiceProvider)

public function boot()
{
    View::composer('*', function ($view) {
        if (auth()->check()) {
            $view->with('customer', Customer::find(auth()->id()));
        }
    });
}

}
