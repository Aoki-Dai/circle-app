<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Room Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <a href="{{ route('room-entries.create') }}" class="btn btn-primary">Create New Entry</a>
                <table class="w-full mt-4 table-auto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Entry Time</th>
                            <th>Exit Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $entry)
                            <tr>
                                <td>{{ $entry->id }}</td>
                                <td>{{ $entry->user_id }}</td>
                                <td>{{ $entry->user_name }}</td>
                                <td>{{ $entry->entry_time }}</td>
                                <td>{{ $entry->exit_time }}</td>
                                <td>
                                    <a href="{{ route('room-entries.show', $entry) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('room-entries.edit', $entry) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('room-entries.destroy', $entry) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
