<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::published()->with('category', 'author');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->latest('published_at')->paginate(9);
        $categories = BlogCategory::withCount(['posts' => function ($q) {
            $q->published();
        }])->get();

        return view('pages.blog', compact('posts', 'categories'));
    }

    public function category(string $locale, string $slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();

        $posts = BlogPost::published()
            ->where('category_id', $category->id)
            ->with('category', 'author')
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogCategory::withCount(['posts' => function ($q) {
            $q->published();
        }])->get();

        return view('pages.blog', compact('posts', 'categories', 'category'));
    }

    public function show(string $locale, string $slug)
    {
        $post = BlogPost::published()
            ->where('slug', $slug)
            ->with('category', 'author')
            ->firstOrFail();

        $post->incrementViews();

        $relatedPosts = $post->getRelatedPosts(3);

        return view('pages.blog-detail', compact('post', 'relatedPosts'));
    }
}
