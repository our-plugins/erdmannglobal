<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::published()->with('images');

        // Transaction type filter
        if ($request->filled('transaction')) {
            $query->where('transaction_type', $request->transaction);
        }

        // Property type filter
        if ($request->filled('type')) {
            $query->where('property_type', $request->type);
        }

        // City filter
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        // Neighborhood filter
        if ($request->filled('neighborhood')) {
            $query->where('neighborhood', $request->neighborhood);
        }

        // Bedrooms filter
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Area range filter
        if ($request->filled('min_area')) {
            $query->where('area_sqm', '>=', $request->min_area);
        }
        if ($request->filled('max_area')) {
            $query->where('area_sqm', '<=', $request->max_area);
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'area_asc':
                $query->orderBy('area_sqm', 'asc');
                break;
            case 'area_desc':
                $query->orderBy('area_sqm', 'desc');
                break;
            default:
                $query->latest();
        }

        $properties = $query->paginate(12)->withQueryString();

        // Get unique cities and neighborhoods for filters
        $cities = Property::published()->distinct()->pluck('city')->filter();
        $neighborhoods = Property::published()->distinct()->pluck('neighborhood')->filter();

        return view('pages.listings', compact('properties', 'cities', 'neighborhoods'));
    }

    public function show(string $locale, string $slug)
    {
        $property = Property::published()
            ->where('slug', $slug)
            ->with(['images', 'features'])
            ->firstOrFail();

        $property->incrementViews();

        $similarProperties = $property->getSimilarProperties(4);

        return view('pages.listing-detail', compact('property', 'similarProperties'));
    }
}
