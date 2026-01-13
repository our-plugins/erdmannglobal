<x-admin-layout>
    <x-slot name="title">Add Property</x-slot>

    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.properties.index') }}" class="text-gray-500 hover:text-gray-700">&larr; Back to Properties</a>
        </div>

        <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Basic Info -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (English) *</label>
                        <input type="text" name="title_en" value="{{ old('title_en') }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500 @error('title_en') border-red-500 @enderror">
                        @error('title_en')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (French) *</label>
                        <input type="text" name="title_fr" value="{{ old('title_fr') }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500 @error('title_fr') border-red-500 @enderror">
                        @error('title_fr')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (English)</label>
                        <textarea name="description_en" rows="4"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('description_en') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (French)</label>
                        <textarea name="description_fr" rows="4"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('description_fr') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Property Details -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Property Details</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price (MAD) *</label>
                        <input type="number" name="price" value="{{ old('price') }}" required step="0.01"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Transaction Type *</label>
                        <select name="transaction_type" required class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                            <option value="sale" {{ old('transaction_type') == 'sale' ? 'selected' : '' }}>Sale</option>
                            <option value="rent" {{ old('transaction_type') == 'rent' ? 'selected' : '' }}>Rent</option>
                            <option value="commercial" {{ old('transaction_type') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Property Type *</label>
                        <select name="property_type" required class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                            @foreach(['apartment', 'house', 'villa', 'land', 'office', 'studio', 'farm', 'garage', 'shop'] as $type)
                                <option value="{{ $type }}" {{ old('property_type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bedrooms</label>
                        <input type="number" name="bedrooms" value="{{ old('bedrooms') }}" min="0"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bathrooms</label>
                        <input type="number" name="bathrooms" value="{{ old('bathrooms') }}" min="0"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Area (sqm)</label>
                        <input type="number" name="area_sqm" value="{{ old('area_sqm') }}" step="0.01"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Floor</label>
                        <input type="text" name="floor" value="{{ old('floor') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Furnished</label>
                    <select name="furnished" class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                        <option value="">Not specified</option>
                        <option value="furnished" {{ old('furnished') == 'furnished' ? 'selected' : '' }}>Furnished</option>
                        <option value="unfurnished" {{ old('furnished') == 'unfurnished' ? 'selected' : '' }}>Unfurnished</option>
                        <option value="semi-furnished" {{ old('furnished') == 'semi-furnished' ? 'selected' : '' }}>Semi-Furnished</option>
                    </select>
                </div>
            </div>

            <!-- Location -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Location</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                        <input type="text" name="city" value="{{ old('city', 'Tangier') }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Neighborhood</label>
                        <input type="text" name="neighborhood" value="{{ old('neighborhood') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Address</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                        <input type="number" name="latitude" value="{{ old('latitude') }}" step="any"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                        <input type="number" name="longitude" value="{{ old('longitude') }}" step="any"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
            </div>

            <!-- Media -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Media</h2>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Property Images</label>
                    <input type="file" name="images[]" multiple accept="image/*"
                        class="w-full rounded-lg border border-gray-300 p-2 focus:border-gold-500 focus:ring-gold-500">
                    <p class="mt-1 text-sm text-gray-500">First image will be set as primary. Max 5MB per image.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Video URL (YouTube or MP4)</label>
                    <input type="url" name="video_url" value="{{ old('video_url') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                </div>
            </div>

            <!-- Features -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Features</h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($features as $key => $feature)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ $feature['label_en'] }}</label>
                            <select name="features[{{ $key }}]" class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500 text-sm">
                                <option value="">---</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- SEO -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title (English)</label>
                        <input type="text" name="meta_title_en" value="{{ old('meta_title_en') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title (French)</label>
                        <input type="text" name="meta_title_fr" value="{{ old('meta_title_fr') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description (English)</label>
                        <textarea name="meta_description_en" rows="2"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('meta_description_en') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description (French)</label>
                        <textarea name="meta_description_fr" rows="2"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('meta_description_fr') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Publishing -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Publishing</h2>

                <div class="flex items-center gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
                        <select name="status" required class="rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                            class="rounded border-gray-300 text-gold-500 focus:ring-gold-500">
                        <label for="featured" class="ml-2 text-sm text-gray-700">Featured Property</label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.properties.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-3 rounded-lg">Cancel</a>
                <button type="submit" class="bg-gold-500 hover:bg-gold-600 text-white font-semibold px-6 py-3 rounded-lg">Create Property</button>
            </div>
        </form>
    </div>
</x-admin-layout>
