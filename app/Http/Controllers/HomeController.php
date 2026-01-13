<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::published()
            ->featured()
            ->with('images')
            ->latest()
            ->take(8)
            ->get();

        $propertiesForRent = Property::published()
            ->forRent()
            ->with('images')
            ->latest()
            ->take(4)
            ->get();

        $propertiesForSale = Property::published()
            ->forSale()
            ->with('images')
            ->latest()
            ->take(4)
            ->get();

        $latestProperties = Property::published()
            ->with('images')
            ->latest()
            ->take(6)
            ->get();

        $latestPosts = BlogPost::published()
            ->with('category', 'author')
            ->latest('published_at')
            ->take(3)
            ->get();

        // Stats
        $stats = [
            'properties' => Property::published()->count(),
            'rentals' => Property::published()->forRent()->count(),
            'sales' => Property::published()->forSale()->count(),
        ];

        return view('pages.home', compact(
            'featuredProperties',
            'propertiesForRent',
            'propertiesForSale',
            'latestProperties',
            'latestPosts',
            'stats'
        ));
    }
}
