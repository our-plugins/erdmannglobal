<x-admin-layout>
    <x-slot name="title">Manage Properties</x-slot>

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Properties</h2>
            <p class="text-gray-600">Manage your property listings</p>
        </div>
        <a href="{{ route('admin.properties.create') }}" class="bg-gold-500 hover:bg-gold-600 text-white font-semibold px-4 py-2 rounded-lg transition">
            + Add Property
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
        <form action="{{ route('admin.properties.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title or code..."
                    class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
            </div>
            <div class="w-40">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="w-40">
                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="transaction" class="w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-gold-500">
                    <option value="">All Types</option>
                    <option value="rent" {{ request('transaction') == 'rent' ? 'selected' : '' }}>Rent</option>
                    <option value="sale" {{ request('transaction') == 'sale' ? 'selected' : '' }}>Sale</option>
                    <option value="commercial" {{ request('transaction') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                </select>
            </div>
            <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-lg">Filter</button>
            <a href="{{ route('admin.properties.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2">Clear</a>
        </form>
    </div>

    <!-- Properties Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Property</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($properties as $property)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img src="{{ $property->primary_image_url }}" alt="{{ $property->title_en }}"
                                    class="w-12 h-12 rounded-lg object-cover">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ Str::limit($property->title_en, 30) }}</div>
                                    <div class="text-sm text-gray-500">{{ $property->property_code }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800 capitalize">{{ $property->transaction_type }}</span>
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800 capitalize ml-1">{{ $property->property_type }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $property->formatted_price }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.properties.toggle-status', $property) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="px-2 py-1 text-xs rounded-full {{ $property->status === 'published' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                    {{ ucfirst($property->status) }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.properties.toggle-featured', $property) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="{{ $property->featured ? 'text-gold-500' : 'text-gray-300' }} hover:text-gold-500">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.properties.edit', $property) }}" class="text-gold-500 hover:text-gold-600 mr-3">Edit</a>
                            <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            No properties found. <a href="{{ route('admin.properties.create') }}" class="text-gold-500 hover:text-gold-600">Add your first property</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $properties->links() }}
    </div>
</x-admin-layout>
