<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Room Entry Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="mb-4">
                    <strong>ID:</strong> {{ $roomEntry->id }}
                </div>
                <div class="mb-4">
                    <strong>User ID:</strong> {{ $roomEntry->user_id }}
                </div>
                <div class="mb-4">
                    <strong>User Name:</strong> {{ $roomEntry->user_name }}
                </div>
                <div class="mb-4">
                    <strong>Entry Time:</strong> {{ $roomEntry->entry_time }}
                </div>
                <div class="mb-4">
                    <strong>Exit Time:</strong> {{ $roomEntry->exit_time }}
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('room-entries.edit', $roomEntry) }}" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-yellow-500 rounded hover:bg-yellow-700 hover:scale-105">Edit</a>
                    <form action="{{ route('room-entries.destroy', $roomEntry) }}" method="POST" style="display:inline;" onsubmit="return confirm('この入室記録を削除してもよろしいですか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-red-500 rounded hover:bg-red-700 hover:scale-105">Delete</button>
                    </form>
                    <a href="{{ route('room-entries.index') }}" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-blue-500 rounded hover:bg-blue-700 hover:scale-105">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
