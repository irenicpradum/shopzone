<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

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
        //
        View::composer('*', function ($view) {

        $cartCount = 0;

        if(session()->has('user'))
        {
            $cartCount = Cart::where(
                'user_id',
                session('user')['id']
            )->count();
        }

        $view->with('cartCount', $cartCount);
    });
    }
}
