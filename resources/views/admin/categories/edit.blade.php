<x-admin-layout>
    <x-slot name="title">Edit Category</x-slot>

    <div class="max-w-2xl">
        <div class="mb-6">
            <a href="{{ route('admin.categories.index') }}" class="text-gray-500 hover:text-gray-700">&larr; Back to Categories</a>
        </div>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Category Details</h2>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name (English) *</label>
                        <input type="text" name="name_en" value="{{ old('name_en', $category->name_en) }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name (French) *</label>
                        <input type="text" name="name_fr" value="{{ old('name_fr', $category->name_fr) }}" required
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.categories.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-3 rounded-lg">Cancel</a>
                <button type="submit" class="bg-gold-500 hover:bg-gold-600 text-white font-semibold px-6 py-3 rounded-lg">Update Category</button>
            </div>
        </form>
    </div>
</x-admin-layout>
