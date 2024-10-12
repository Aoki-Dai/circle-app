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
                <a href="{{ route('room-entries.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
