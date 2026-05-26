<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Services\CartService;

class CartController extends Controller
{
    protected CartService $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->cart->toArray();
        return view('cart.index', compact('cart'));
    }

    public function add(AddToCartRequest $request)
    {
        $item = $this->cart->add(
            $request->product_id,
            $request->quantity ?? 1
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Item added to cart.',
                'cart' => $this->cart->toArray(),
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart.');
    }

    public function update(UpdateCartRequest $request, int $rowId)
    {
        $item = $this->cart->update($rowId, $request->quantity);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $item ? 'Cart updated.' : 'Item removed.',
                'cart' => $this->cart->toArray(),
            ]);
        }

        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function remove(int $rowId)
    {
        $this->cart->remove($rowId);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart.',
                'cart' => $this->cart->toArray(),
            ]);
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function clear()
    {
        $this->cart->clear();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Cart cleared.',
                'cart' => $this->cart->toArray(),
            ]);
        }

        return redirect()->back()->with('success', 'Cart cleared.');
    }
}
