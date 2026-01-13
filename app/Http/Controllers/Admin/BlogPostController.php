<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::with('category', 'author')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%{$search}%")
                    ->orWhere('title_fr', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(15);
        $categories = BlogCategory::all();

        return view('admin.blog.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'excerpt_en' => 'nullable|string',
            'excerpt_fr' => 'nullable|string',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
            'category_id' => 'nullable|exists:blog_categories,id',
            'author_name' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required|in:draft,published',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_fr' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['title_en']);
        $validated['author_id'] = auth()->id();

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $blog)
    {
        $categories = BlogCategory::all();
        $post = $blog;
        return view('admin.blog.edit', compact('post', 'categories'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'excerpt_en' => 'nullable|string',
            'excerpt_fr' => 'nullable|string',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
            'category_id' => 'nullable|exists:blog_categories,id',
            'author_name' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status' => 'required|in:draft,published',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_fr' => 'nullable|string',
        ]);

        if ($validated['status'] === 'published' && !$blog->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $blog)
    {
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    public function toggleStatus(BlogPost $post)
    {
        $status = $post->status === 'published' ? 'draft' : 'published';

        $post->update([
            'status' => $status,
            'published_at' => $status === 'published' && !$post->published_at ? now() : $post->published_at,
        ]);

        return back()->with('success', 'Blog post status updated.');
    }
}
