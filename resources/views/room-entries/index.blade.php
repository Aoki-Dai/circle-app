<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('いま部室にいる人') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="mx-4 my-4">
                    <a href="{{ route('room-entries.create') }}" class="inline-block px-4 py-2 font-semibold text-white transition duration-300 ease-in-out transform bg-blue-500 rounded hover:bg-blue-700 hover:scale-105">鍵を借りたor部室に行ったらタップ！</a>
                </div>
                <div class="mt-4 overflow-x-auto">
                    <table class="w-full table-auto">
                        {{-- <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">User ID</th>
                                <th class="px-4 py-2">User Name</th>
                                <th class="px-4 py-2">Entry Time</th>
                                <th class="px-4 py-2">Exit Time</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead> --}}
                        <tbody>
                            @foreach ($entries as $entry)
                                {{-- <tr class="transition duration-300 ease-in-out border-b hover:bg-gray-100">
                                    <td class="px-4 py-2">{{ $entry->id }}</td>
                                    <td class="px-4 py-2">{{ $entry->user_id }}</td>
                                    <td class="px-4 py-2">{{ $entry->user_name }}</td>
                                    <td class="px-4 py-2">{{ $entry->entry_time }}</td>
                                    <td class="px-4 py-2">{{ $entry->exit_time }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('room-entries.show', $entry) }}" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-blue-500 rounded hover:bg-blue-700 hover:scale-105">View</a>
                                        <a href="{{ route('room-entries.edit', $entry) }}" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-yellow-500 rounded hover:bg-yellow-700 hover:scale-105">Edit</a>
                                        <form action="{{ route('room-entries.destroy', $entry) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block px-4 py-2 text-white transition duration-300 ease-in-out transform bg-red-500 rounded hover:bg-red-700 hover:scale-105">Delete</button>
                                        </form>
                                    </td>
                                </tr> --}}

                                <section class="text-gray-600 body-font">
                                    <div class="container px-5 py-1 mx-auto">
                                      <div class="flex flex-wrap -m-4">
                                        <div class="w-full p-4">
                                          <div class="h-full overflow-hidden border-2 border-gray-200 rounded-lg border-opacity-60">
                                            {{-- <img class="object-cover object-center w-full lg:h-48 md:h-36" src="https://dummyimage.com/722x402" alt="blog"> --}}
                                            <div class="p-6">
                                              {{-- <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">CATEGORY</h2> --}}
                                              <h1 class="mb-3 text-lg font-medium text-gray-900 title-font">
                                                {{ $entry->user_name }}
                                              </h1>
                                              <p class="mb-3 leading-relaxed">
                                                {{ $entry->entry_time }}
                                                ({{ $entry->entry_time->diffForHumans() }})
                                              </p>
                                              <div class="flex flex-wrap items-center ">
                                                {{-- <a class="inline-flex items-center text-indigo-500 md:mb-2 lg:mb-0">Learn More
                                                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                  </svg>
                                                </a> --}}
                                                <span class="inline-flex items-center py-1 pr-3 ml-auto mr-3 text-sm leading-none text-gray-400 border-r-2 border-gray-200 lg:ml-auto md:ml-0">
                                                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                  </svg>1.2K
                                                </span>
                                                <span class="inline-flex items-center text-sm leading-none text-gray-400">
                                                  <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                                  </svg>6
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
