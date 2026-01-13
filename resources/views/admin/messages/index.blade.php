<x-admin-layout>
    <x-slot name="title">Contact Messages</x-slot>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Contact Messages</h2>
        <p class="text-gray-600">Manage inquiries from website visitors</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">From</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject/Property</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($messages as $message)
                    <tr class="{{ !$message->is_read ? 'bg-gold-50' : '' }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if(!$message->is_read)
                                    <span class="w-2 h-2 bg-gold-500 rounded-full mr-2"></span>
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $message->email }}</div>
                                    @if($message->phone)
                                        <div class="text-sm text-gray-500">{{ $message->phone }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            @if($message->property)
                                <a href="{{ route('admin.properties.edit', $message->property) }}" class="text-gold-500 hover:text-gold-600">
                                    {{ Str::limit($message->property->title_en, 30) }}
                                </a>
                            @else
                                General Inquiry
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($message->message, 50) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $message->created_at->format('M d, Y H:i') }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.messages.show', $message) }}" class="text-gold-500 hover:text-gold-600 mr-3">View</a>
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">No messages yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $messages->links() }}</div>
</x-admin-layout>
