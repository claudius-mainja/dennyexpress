<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::published()
            ->with('author', 'categories')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('blog.index', compact('blogs'));
    }

    public function show(string $slug): View
    {
        $blog = Blog::published()
            ->where('slug', $slug)
            ->with('author', 'categories')
            ->firstOrFail();

        $recent = Blog::published()
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        return view('blog.show', compact('blog', 'recent'));
    }
}
