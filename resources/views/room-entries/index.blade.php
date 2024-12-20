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
                        <tbody>
                            @foreach ($entries as $entry)
                                <section class="text-gray-600 body-font">
                                    <div class="container px-5 py-1 mx-auto">
                                      <div class="flex flex-wrap -m-4">
                                        <div class="w-full p-4">
                                          <div class="h-full overflow-hidden border-2 border-gray-200 rounded-lg border-opacity-60">
                                            {{-- <img class="object-cover object-center w-full lg:h-48 md:h-36" src="https://dummyimage.com/722x402" alt="blog"> --}}
                                            <div class="p-6">
                                              {{-- <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">CATEGORY</h2> --}}
                                                <div>
                                                    <h1 class="mb-3 text-lg font-medium text-gray-900 title-font">
                                                        <a href="{{ route('room-entries.show', $entry) }}" class="hover:underline">
                                                            {{ $entry->user_name }}
                                                        </a>
                                                    </h1>
                                                    <p class="mb-3 leading-relaxed">
                                                        {{ $entry->entry_time }}
                                                        ({{ $entry->entry_time->setTimezone('Asia/Tokyo')->diffForHumans() }})
                                                    </p>
                                                </div>
                                              <div class="flex flex-wrap items-center">
                                                <button class="inline-flex items-center text-indigo-500 md:mb-2 lg:mb-0" onclick="likeEntry({{ $entry->id }})">
                                                    いまいく
                                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5l7 7-7 7"></path>
                                                    </svg>
                                                </button>
                                                <span id="like-count-{{ $entry->id }}" class="inline-flex items-center py-1 pr-3 ml-auto mr-3 text-sm leading-none text-gray-400 border-r-2 border-gray-200 lg:ml-auto md:ml-0">
                                                    {{-- <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg> --}}
                                                    {{ $entry->likes_count }}
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

<script>
    function likeEntry(roomEntryId) {
        fetch('{{ route('likes.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ room_entry_id: roomEntryId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // カウントを更新する処理
                const likeCountSpan = document.querySelector(`#like-count-${roomEntryId}`);
                likeCountSpan.textContent = parseInt(likeCountSpan.textContent) + 1;
            }
        });
    }
</script>
