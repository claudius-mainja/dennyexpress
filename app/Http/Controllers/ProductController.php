<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('primaryImage', 'categories')
            ->where('is_active', true);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->category;
            $category = Category::where('slug', $categorySlug)->first();
            
            if ($category) {
                $childIds = $category->children()->pluck('id')->toArray();
                $allCategoryIds = array_merge([$category->id], $childIds);
                
                $query->whereHas('categories', fn($q) => $q->whereIn('categories.id', $allCategoryIds));
            }
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderByRaw('COALESCE(sale_price, price) ASC');
                    break;
                case 'price_desc':
                    $query->orderByRaw('COALESCE(sale_price, price) DESC');
                    break;
                case 'name':
                    $query->orderBy('name', 'ASC');
                    break;
                case 'newest':
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(12)->appends($request->query());

        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        $selectedCategory = $request->filled('category') 
            ? Category::where('slug', $request->category)->first() 
            : null;

        return view('shop.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function show(string $slug)
    {
        $product = Product::with([
            'images',
            'primaryImage',
            'categories',
            'approvedReviews' => fn($q) => $q->latest()->limit(10),
        ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $related = Product::with('primaryImage')
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->whereHas('categories', fn($q) => $q->whereIn(
                'categories.id',
                $product->categories->pluck('id')
            ))
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'related'));
    }

    public function category(string $categorySlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->where('is_active', true)
            ->firstOrFail();

        $childIds = $category->children()->pluck('id')->toArray();
        $allCategoryIds = array_merge([$category->id], $childIds);

        $products = Product::with('primaryImage', 'categories')
            ->where('is_active', true)
            ->whereHas('categories', fn($q) => $q->whereIn('categories.id', $allCategoryIds))
            ->latest()
            ->paginate(12);

        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('sort_order')
            ->get();

        return view('products.category', compact('products', 'category', 'categories'));
    }
}
