<x-admin-layout>
    <x-slot name="title">Manage Categories</x-slot>

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Blog Categories</h2>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="bg-gold-500 hover:bg-gold-600 text-white font-semibold px-4 py-2 rounded-lg">
            + Add Category
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name (EN)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name (FR)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Posts</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($categories as $category)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $category->name_en }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $category->name_fr }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $category->slug }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $category->posts_count ?? 0 }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-gold-500 hover:text-gold-600 mr-3">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">No categories found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
