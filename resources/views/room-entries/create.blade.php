<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Room Entry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <form action="{{ route('room-entries.store') }}" method="POST">
                    @csrf
                    <div>
                        <x-label for="user_id" :value="__('User ID')" />
                        <x-input id="user_id" class="block w-full mt-1" type="text" name="user_id" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-label for="user_name" :value="__('User Name')" />
                        <x-input id="user_name" class="block w-full mt-1" type="text" name="user_name" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="entry_time" :value="__('Entry Time')" />
                        <x-input id="entry_time" class="block w-full mt-1" type="datetime-local" name="entry_time" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="exit_time" :value="__('Exit Time')" />
                        <x-input id="exit_time" class="block w-full mt-1" type="datetime-local" name="exit_time" />
                    </div>
                    <div class="mt-4">
                        <x-button>
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
