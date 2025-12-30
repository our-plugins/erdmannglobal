<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with('images')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('transaction')) {
            $query->where('transaction_type', $request->transaction);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%{$search}%")
                    ->orWhere('title_fr', 'like', "%{$search}%")
                    ->orWhere('property_code', 'like', "%{$search}%");
            });
        }

        $properties = $query->paginate(15);

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $features = PropertyFeature::AVAILABLE_FEATURES;
        return view('admin.properties.create', compact('features'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'transaction_type' => 'required|in:rent,sale,commercial',
            'property_type' => 'required|in:apartment,house,villa,land,office,studio,farm,garage,shop',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'area_sqm' => 'nullable|numeric|min:0',
            'floor' => 'nullable|string',
            'furnished' => 'nullable|in:furnished,unfurnished,semi-furnished',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'neighborhood' => 'nullable|string|max:100',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'video_url' => 'nullable|url',
            'featured' => 'boolean',
            'status' => 'required|in:draft,published',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_fr' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'features' => 'nullable|array',
        ]);

        $validated['slug'] = Str::slug($validated['title_en']);
        $validated['property_code'] = 'P' . strtoupper(Str::random(8));
        $validated['featured'] = $request->boolean('featured');

        $property = Property::create($validated);

        // Handle images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');
                $property->images()->create([
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                    'sort_order' => $index,
                ]);
            }
        }

        // Handle features
        if ($request->has('features')) {
            foreach ($request->features as $key => $value) {
                $property->features()->create([
                    'feature_key' => $key,
                    'value' => $value ?: null,
                ]);
            }
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        $property->load('images', 'features');
        $features = PropertyFeature::AVAILABLE_FEATURES;
        return view('admin.properties.edit', compact('property', 'features'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'transaction_type' => 'required|in:rent,sale,commercial',
            'property_type' => 'required|in:apartment,house,villa,land,office,studio,farm,garage,shop',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'area_sqm' => 'nullable|numeric|min:0',
            'floor' => 'nullable|string',
            'furnished' => 'nullable|in:furnished,unfurnished,semi-furnished',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'neighborhood' => 'nullable|string|max:100',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'video_url' => 'nullable|url',
            'featured' => 'boolean',
            'status' => 'required|in:draft,published',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_fr' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_fr' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'features' => 'nullable|array',
        ]);

        $validated['featured'] = $request->boolean('featured');

        $property->update($validated);

        // Handle new images
        if ($request->hasFile('images')) {
            $maxOrder = $property->images()->max('sort_order') ?? -1;
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');
                $property->images()->create([
                    'image_path' => $path,
                    'is_primary' => $property->images()->count() === 0 && $index === 0,
                    'sort_order' => $maxOrder + $index + 1,
                ]);
            }
        }

        // Update features
        $property->features()->delete();
        if ($request->has('features')) {
            foreach ($request->features as $key => $value) {
                $property->features()->create([
                    'feature_key' => $key,
                    'value' => $value ?: null,
                ]);
            }
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Delete images from storage
        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }

    public function toggleStatus(Property $property)
    {
        $property->update([
            'status' => $property->status === 'published' ? 'draft' : 'published',
        ]);

        return back()->with('success', 'Property status updated.');
    }

    public function toggleFeatured(Property $property)
    {
        $property->update([
            'featured' => !$property->featured,
        ]);

        return back()->with('success', 'Property featured status updated.');
    }

    public function deleteImage(Property $property, PropertyImage $image)
    {
        if ($image->property_id !== $property->id) {
            abort(404);
        }

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
