<?php

namespace App\Http\ViewComposers;

use App\Services\CartService;
use App\Services\WishlistService;
use Illuminate\View\View;

class CartComposer
{
    protected CartService $cartService;
    protected WishlistService $wishlistService;

    public function __construct(CartService $cartService, WishlistService $wishlistService)
    {
        $this->cartService = $cartService;
        $this->wishlistService = $wishlistService;
    }

    public function compose(View $view): void
    {
        $cartCount = $this->cartService->count();
        $cartTotal = $this->cartService->total();
        $wishlistCount = $this->wishlistService->count();

        $view->with([
            'cartCount' => $cartCount,
            'cartTotal' => $cartTotal,
            'wishlistCount' => $wishlistCount,
        ]);
    }
}
