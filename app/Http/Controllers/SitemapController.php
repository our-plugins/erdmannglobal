<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\BlogPost;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $properties = Property::published()->latest()->get();
        $posts = BlogPost::published()->latest()->get();

        $content = view('sitemap.index', compact('properties', 'posts'))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
