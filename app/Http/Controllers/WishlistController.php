<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    protected WishlistService $wishlist;

    public function __construct(WishlistService $wishlist)
    {
        $this->wishlist = $wishlist;
    }

    public function index()
    {
        $items = $this->wishlist->content();
        return view('wishlist.index', compact('items'));
    }

    public function store(Product $product)
    {
        $added = $this->wishlist->add($product->id);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => $added,
                'message' => $added ? 'Added to wishlist.' : 'Already in wishlist.',
                'count' => $this->wishlist->count(),
            ]);
        }

        return redirect()->back()->with(
            $added ? 'success' : 'info',
            $added ? 'Added to wishlist.' : 'Already in wishlist.'
        );
    }

    public function destroy(Product $product)
    {
        $this->wishlist->remove($product->id);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Removed from wishlist.',
                'count' => $this->wishlist->count(),
            ]);
        }

        return redirect()->back()->with('success', 'Removed from wishlist.');
    }

    public function toggle(Product $product)
    {
        $isIn = $this->wishlist->toggle($product->id);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_in_wishlist' => $isIn,
                'message' => $isIn ? 'Added to wishlist.' : 'Removed from wishlist.',
                'count' => $this->wishlist->count(),
            ]);
        }

        return redirect()->back()->with(
            'success',
            $isIn ? 'Added to wishlist.' : 'Removed from wishlist.'
        );
    }

    public function moveToCart(Product $product)
    {
        $this->wishlist->moveToCart($product->id);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Moved to cart.',
                'count' => $this->wishlist->count(),
            ]);
        }

        return redirect()->route('cart')->with('success', 'Moved to cart.');
    }
}
