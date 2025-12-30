<x-admin-layout>
    <x-slot name="title">View Message</x-slot>

    <div class="max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('admin.messages.index') }}" class="text-gray-500 hover:text-gray-700">&larr; Back to Messages</a>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">{{ $message->name }}</h2>
                    <p class="text-gray-600">{{ $message->email }}</p>
                    @if($message->phone)
                        <p class="text-gray-600">{{ $message->phone }}</p>
                    @endif
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500">{{ $message->created_at->format('M d, Y') }}</p>
                    <p class="text-sm text-gray-500">{{ $message->created_at->format('H:i') }}</p>
                </div>
            </div>

            @if($message->property)
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-500 mb-2">Regarding Property:</p>
                    <a href="{{ route('admin.properties.edit', $message->property) }}" class="text-gold-500 hover:text-gold-600 font-medium">
                        {{ $message->property->title_en }} ({{ $message->property->property_code }})
                    </a>
                </div>
            @endif

            <div class="border-t pt-6">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Message</h3>
                <div class="prose prose-gray max-w-none">
                    {!! nl2br(e($message->message)) !!}
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="mailto:{{ $message->email }}" class="bg-gold-500 hover:bg-gold-600 text-white font-semibold px-6 py-3 rounded-lg">
                Reply via Email
            </a>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg">
                    Delete Message
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
