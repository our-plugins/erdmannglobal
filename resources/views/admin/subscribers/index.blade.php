<x-admin-layout>
    <x-slot name="title">Newsletter Subscribers</x-slot>

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Newsletter Subscribers</h2>
            <p class="text-gray-600">{{ $subscribers->total() }} total subscribers</p>
        </div>
        <a href="{{ route('admin.subscribers.export') }}" class="bg-gray-800 hover:bg-gray-900 text-white font-semibold px-4 py-2 rounded-lg">
            Export CSV
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subscribed</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($subscribers as $subscriber)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $subscriber->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $subscriber->subscribed_at->format('M d, Y H:i') }}</td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" class="inline" onsubmit="return confirm('Unsubscribe this email?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-gray-500">No subscribers yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $subscribers->links() }}</div>
</x-admin-layout>
