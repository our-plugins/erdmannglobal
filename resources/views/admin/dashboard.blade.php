<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gold-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_properties'] }}</h3>
                    <p class="text-gray-500">Total Properties</p>
                </div>
            </div>
            <div class="mt-4 flex text-sm">
                <span class="text-green-500">{{ $stats['published_properties'] }} published</span>
                <span class="mx-2 text-gray-300">|</span>
                <span class="text-yellow-500">{{ $stats['draft_properties'] }} draft</span>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_posts'] }}</h3>
                    <p class="text-gray-500">Blog Posts</p>
                </div>
            </div>
            <div class="mt-4 text-sm text-green-500">
                {{ $stats['published_posts'] }} published
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $stats['unread_messages'] }}</h3>
                    <p class="text-gray-500">Unread Messages</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-gold-500 hover:text-gold-600">View all &rarr;</a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_subscribers'] }}</h3>
                    <p class="text-gray-500">Subscribers</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.subscribers.index') }}" class="text-sm text-gold-500 hover:text-gold-600">View all &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Recent Data -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Properties -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">Recent Properties</h2>
                <a href="{{ route('admin.properties.create') }}" class="text-sm text-gold-500 hover:text-gold-600">+ Add New</a>
            </div>
            <div class="p-6">
                @if($recentProperties->count())
                    <div class="space-y-4">
                        @foreach($recentProperties as $property)
                            <div class="flex items-center">
                                <img src="{{ $property->primary_image_url }}" alt="{{ $property->title_en }}"
                                    class="w-12 h-12 rounded-lg object-cover">
                                <div class="ml-4 flex-1">
                                    <h4 class="font-medium text-gray-900 truncate">{{ $property->title_en }}</h4>
                                    <p class="text-sm text-gray-500">{{ $property->formatted_price }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full {{ $property->status === 'published' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                    {{ ucfirst($property->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">No properties yet</p>
                @endif
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">Recent Messages</h2>
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-gold-500 hover:text-gold-600">View all &rarr;</a>
            </div>
            <div class="p-6">
                @if($recentMessages->count())
                    <div class="space-y-4">
                        @foreach($recentMessages as $message)
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-gray-600 font-medium">{{ substr($message->name, 0, 1) }}</span>
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-medium text-gray-900">{{ $message->name }}</h4>
                                        <span class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-gray-500 truncate">{{ $message->message }}</p>
                                </div>
                                @if(!$message->is_read)
                                    <span class="w-2 h-2 bg-red-500 rounded-full ml-2 flex-shrink-0"></span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">No messages yet</p>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
