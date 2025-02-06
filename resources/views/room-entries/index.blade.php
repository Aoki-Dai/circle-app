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
                                                <div class="flex items-start justify-between">
                                                    <div>
                                                        <h1 class="mb-3 text-lg font-medium text-gray-900 title-font">
                                                            <a href="{{ route('room-entries.show', $entry) }}" class="hover:underline">
                                                                {{ $entry->user_name }}
                                                            </a>
                                                            @if ($entry->updated_at->gt($entry->created_at))
                                                                <span class="ml-2 text-sm text-gray-500">(編集済み)</span>
                                                            @endif
                                                        </h1>
                                                    </div>

                                                    {{-- 自分の投稿に対してのみ編集・削除ボタンを表示 --}}
                                                    @if (Auth::id() === $entry->user_id)
                                                        <div class="relative" x-data="{ open: false }">
                                                            <button @click="open = !open" class="p-1.5 rounded-full text-gray-400 hover:text-gray-600 hover:bg-gray-100/75 transition-colors duration-200">
                                                                {{-- ケバブメニュー --}}
                                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                                </svg>
                                                            </button>

                                                            {{-- ケバブメニューの中身（ポップアップ） --}}
                                                            <div x-show="open" @click.away="open = false"
                                                            class="absolute right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl">
                                                                {{-- 編集ボタン --}}
                                                                <a href="{{ route('room-entries.edit', $entry) }}"
                                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                    編集
                                                                </a>
                                                                {{-- 削除ボタン --}}
                                                                <form action="{{ route('room-entries.destroy', $entry) }}" method="POST"
                                                                    onsubmit="return confirm('本当に削除しますか？');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-gray-100">
                                                                        削除
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                    <p class="mb-1 leading-relaxed">
                                                        <span class="font-medium">入室：</span>
                                                        {{ $entry->entry_time->setTimezone('Asia/Tokyo')->format('m/d H:i') }}
                                                        ({{ $entry->entry_time->setTimezone('Asia/Tokyo')->diffForHumans() }})
                                                    </p>
                                                    @if ($entry->exit_time)
                                                        <p class="mb-3 leading-relaxed text-gray-500">
                                                            <span class="font-medium">退出：</span>
                                                            {{ $entry->exit_time->setTimezone('Asia/Tokyo')->format('m/d H:i') }}
                                                            ({{ $entry->exit_time->setTimezone('Asia/Tokyo')->diffForHumans() }})
                                                        </p>
                                                    @else
                                                        <p class="mb-3 leading-relaxed text-gray-500">
                                                            現在部室にいます
                                                        </p>
                                                    @endif

                                              <div class="flex flex-wrap items-center">
                                                <button
                                                    class="inline-flex items-center {{ $entry->isLikedByUser(Auth::id()) ? 'text-pink-500' : 'text-indigo-500' }} md:mb-2 lg:mb-0"
                                                    onclick="toggleLike({{ $entry->id }}, this)"
                                                >
                                                    いまいく
                                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14"></path>
                                                        <path d="M12 5l7 7-7 7"></path>
                                                    </svg>
                                                </button>

                                                {{-- いまいくを押した人のリスト --}}
                                                <div class="ml-4">
                                                    <span id="like-count-{{ $entry->id }}" class="text-sm text-gray-500">
                                                        {{ $entry->likes_count ?? 0 }}人がいまいくを押しました
                                                    </span>
                                                    <div class="text-sm text-gray-500">
                                                        @foreach($entry->likes as $like)
                                                            <span class="inline-block mr-2">{{ $like->user->name }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                              </div>
                                            </div> {{-- p-6 --}}
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
    function toggleLike(roomEntryId, button) {
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
                // いまいくカウントを更新する処理
                const likeCountSpan = document.querySelector(`#like-count-${roomEntryId}`);
                likeCountSpan.textContent = `${data.count}人がいまいくを押しました`;

                // ボタンの色を変更する処理
                if (data.liked) {
                    button.classList.remove('text-indigo-500');
                    button.classList.add('text-pink-500');
                } else {
                    button.classList.remove('text-pink-500');
                    button.classList.add('text-indigo-500');
                }
            }
        })
        .catch(error => {console.error('Error:', error);});
    }
</script>
