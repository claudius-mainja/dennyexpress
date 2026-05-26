<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('primaryImage', 'categories')
            ->where('is_active', true)
            ->where(function ($q) {
                $q->where('featured', true)->orWhere('is_featured', true);
            })
            ->latest()
            ->limit(8)
            ->get();

        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::with('primaryImage', 'categories')
                ->where('is_active', true)
                ->latest()
                ->limit(8)
                ->get();
        }

        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        return view('welcome', compact('featuredProducts', 'categories'));
    }
}
