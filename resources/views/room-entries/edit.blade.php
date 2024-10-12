<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Room Entry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <form action="{{ route('room-entries.update', $roomEntry) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="user_id" :value="__('User ID')" />
                        <x-input id="user_id" class="block w-full mt-1" type="text" name="user_id" value="{{ $roomEntry->user_id }}" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-label for="user_name" :value="__('User Name')" />
                        <x-input id="user_name" class="block w-full mt-1" type="text" name="user_name" value="{{ $roomEntry->user_name }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="entry_time" :value="__('Entry Time')" />
                        <x-input id="entry_time" class="block w-full mt-1" type="datetime-local" name="entry_time" value="{{ $roomEntry->entry_time }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="exit_time" :value="__('Exit Time')" />
                        <x-input id="exit_time" class="block w-full mt-1" type="datetime-local" name="exit_time" value="{{ $roomEntry->exit_time }}" />
                    </div>
                    <div class="mt-4">
                        <x-button>
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
