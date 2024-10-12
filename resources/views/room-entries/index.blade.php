<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('いま部室にいる人') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <a href="{{ route('room-entries.create') }}" class="inline-block px-4 py-2 font-semibold text-white transition duration-300 ease-in-out transform bg-blue-500 rounded hover:bg-blue-700 hover:scale-105">鍵を借りた、部室に行ったらタップ！</a>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                {{-- <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">User ID</th> --}}
                                <th class="px-4 py-2">User Name</th>
                                <th class="px-4 py-2">Entry Time</th>
                                {{-- <th class="px-4 py-2">Exit Time</th> --}}
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                                <tr class="transition duration-300 ease-in-out border-b hover:bg-gray-100">
                                    {{-- <td class="px-4 py-2">{{ $entry->id }}</td>
                                    <td class="px-4 py-2">{{ $entry->user_id }}</td> --}}
                                    <td class="px-4 py-2">{{ $entry->user_name }}</td>
                                    <td class="px-4 py-2">{{ $entry->entry_time }}</td>
                                    {{-- <td class="px-4 py-2">{{ $entry->exit_time }}</td> --}}
                                    <td class="px-4 py-2">
                                        <a href="{{ route('room-entries.show', $entry) }}" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-blue-500 rounded hover:bg-blue-700 hover:scale-105">View</a>
                                        <a href="{{ route('room-entries.edit', $entry) }}" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-yellow-500 rounded hover:bg-yellow-700 hover:scale-105">Edit</a>
                                        <form action="{{ route('room-entries.destroy', $entry) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-red-500 rounded hover:bg-red-700 hover:scale-105">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
