<x-admin-layout>
    <x-slot name="title">Edit Blog Post</x-slot>

    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.blog.index') }}" class="text-gray-500 hover:text-gray-700">&larr; Back to Posts</a>
        </div>

        <form action="{{ route('admin.blog.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Post Content</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (English) *</label>
                        <input type="text" name="title_en" value="{{ old('title_en', $post->title_en) }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (French) *</label>
                        <input type="text" name="title_fr" value="{{ old('title_fr', $post->title_fr) }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt (English)</label>
                        <textarea name="excerpt_en" rows="3"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('excerpt_en', $post->excerpt_en) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt (French)</label>
                        <textarea name="excerpt_fr" rows="3"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('excerpt_fr', $post->excerpt_fr) }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Content (English) *</label>
                        <textarea name="content_en" rows="10" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('content_en', $post->content_en) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Content (French) *</label>
                        <textarea name="content_fr" rows="10" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('content_fr', $post->content_fr) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Category, Author & Image -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Category, Author & Media</h2>

                @if($post->featured_image)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                    <img src="{{ $post->featured_image_url }}" alt="" class="w-48 h-32 object-cover rounded-lg">
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select name="category_id" class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Author Name</label>
                        <input type="text" name="author_name" value="{{ old('author_name', $post->author_name) }}" placeholder="Enter author name"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Replace Featured Image</label>
                        <input type="file" name="featured_image" accept="image/*"
                            class="w-full rounded-lg border border-gray-300 p-2 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title (English)</label>
                        <input type="text" name="meta_title_en" value="{{ old('meta_title_en', $post->meta_title_en) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title (French)</label>
                        <input type="text" name="meta_title_fr" value="{{ old('meta_title_fr', $post->meta_title_fr) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description (English)</label>
                        <textarea name="meta_description_en" rows="2"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('meta_description_en', $post->meta_description_en) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description (French)</label>
                        <textarea name="meta_description_fr" rows="2"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">{{ old('meta_description_fr', $post->meta_description_fr) }}</textarea>
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
                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Publish Date</label>
                        <input type="datetime-local" name="published_at"
                            value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}"
                            class="rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.blog.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-3 rounded-lg">Cancel</a>
                <button type="submit" class="bg-gold-500 hover:bg-gold-600 text-white font-semibold px-6 py-3 rounded-lg">Update Post</button>
            </div>
        </form>
    </div>
</x-admin-layout>
