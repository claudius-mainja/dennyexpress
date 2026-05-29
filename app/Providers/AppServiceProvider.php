<?php

namespace App\Providers;

use App\Services\CartService;
use App\Services\Payments\PaymentGatewayManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\CartComposer;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CartService::class);
        $this->app->singleton(PaymentGatewayManager::class);
    }

    public function boot(): void
    {
        View::composer('*', CartComposer::class);
    }
}
