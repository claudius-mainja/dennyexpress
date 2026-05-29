<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Services\CartService;
use App\Services\WishlistService;
use Illuminate\Http\Request;
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
        if (app()->runningInConsole()) {
            return;
        }

        /** @var Request $request */
        $request = request();

        if ($request && str_starts_with($request->path(), 'admin')) {
            return;
        }

        $cartCount = $this->cartService->count();
        $cartTotal = $this->cartService->total();
        $wishlistCount = $this->wishlistService->count();
        $wishlistIds = $this->wishlistService->allIds();

        $navCategories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with(['children' => fn($q) => $q->where('is_active', true)->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->take(12)
            ->get();

        $view->with([
            'cartCount' => $cartCount,
            'cartTotal' => $cartTotal,
            'wishlistCount' => $wishlistCount,
            'wishlistIds' => $wishlistIds,
            'navCategories' => $navCategories,
        ]);
    }
}
