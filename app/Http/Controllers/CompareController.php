<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CompareService;

class CompareController extends Controller
{
    protected CompareService $compare;

    public function __construct(CompareService $compare)
    {
        $this->compare = $compare;
    }

    public function index()
    {
        $products = $this->compare->content();
        $maxItems = $this->compare->maxItems();
        return view('compare.index', compact('products', 'maxItems'));
    }

    public function store(Product $product)
    {
        $added = $this->compare->add($product->id);

        if (!$added && $this->compare->count() >= $this->compare->maxItems()) {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Compare list is full (max ' . $this->compare->maxItems() . ' items).',
                ], 422);
            }

            return redirect()->back()->with('error', 'Compare list is full (max ' . $this->compare->maxItems() . ' items).');
        }

        if (request()->wantsJson()) {
            return response()->json([
                'success' => $added,
                'message' => $added ? 'Added to compare.' : 'Already in compare list.',
                'count' => $this->compare->count(),
            ]);
        }

        return redirect()->back()->with(
            $added ? 'success' : 'info',
            $added ? 'Added to compare.' : 'Already in compare list.'
        );
    }

    public function destroy(Product $product)
    {
        $this->compare->remove($product->id);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Removed from comparison.',
                'count' => $this->compare->count(),
            ]);
        }

        return redirect()->back()->with('success', 'Removed from comparison.');
    }

    public function clear()
    {
        $this->compare->clear();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Compare list cleared.',
            ]);
        }

        return redirect()->back()->with('success', 'Compare list cleared.');
    }
}
