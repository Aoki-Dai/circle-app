<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Room Entry Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div>
                    <strong>ID:</strong> {{ $roomEntry->id }}
                </div>
                <div>
                    <strong>User ID:</strong> {{ $roomEntry->user_id }}
                </div>
                <div>
                    <strong>User Name:</strong> {{ $roomEntry->user_name }}
                </div>
                <div>
                    <strong>Entry Time:</strong> {{ $roomEntry->entry_time }}
                </div>
                <div>
                    <strong>Exit Time:</strong> {{ $roomEntry->exit_time }}
                </div>
                <a href="{{ route('room-entries.edit', $roomEntry) }}" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-yellow-500 rounded hover:bg-yellow-700 hover:scale-105">Edit</a>
                <form action="{{ route('room-entries.destroy', $roomEntry) }}" method="POST" style="display:inline;" onsubmit="return confirm('この入室記録を削除してもよろしいですか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-red-500 rounded hover:bg-red-700 hover:scale-105">Delete</button>
                </form><br>
                <a href="{{ route('room-entries.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
