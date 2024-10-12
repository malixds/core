<!-- Feature Item -->
@foreach ($executors as $executor)
    <div
        class="relative mb-8 flex flex-col rounded-2xl border border-solid border-black p-8 [box-shadow:rgb(0,_0,_0)_9px_9px] lg:mb-4">
        <div
            class="absolute -top-8 bottom-auto left-auto right-4 flex h-16 w-16 flex-col items-center justify-center rounded-full border border-solid border-[#9b9b9b] bg-white [box-shadow:rgb(0,_0,_0)_0px_5px] lg:right-8">
            <img src="https://assets.website-files.com/63904f663019b0d8edf8d57c/639157f1a197859a6cd7f265_image%203.png"
                alt="" class="relative z-10 inline-block h-8" />
            <div class="absolute z-0 h-8 w-8 rounded-full border border-[#c0d1ff] bg-[#c0d1ff]">
            </div>
        </div>
        <div class="flex justify-between">
            <p class="mb-4 text-xl font-semibold">
                {{ $executor->name }}
            </p>
            {{-- @if (auth()->user() !== null)
                        @if ($post->user->id === $user->id || $user->roles->first()->name === 'admin')
                            <a href="{{ route('post.edit-show', $post->id) }}"><i
                                    class="mt-1 fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ route('post.delete', $post->id) }}"><i class="mt-1 fa-solid fa-trash"></i></a>
                        @endif
                    @endif --}}
        </div>

        <p>
            {{ $executor->description }}
        </p>
        @if ($executor->subjects)
            @foreach ($executor->subjects as $subject)
                <p>{{ $subject->name }}</p>
            @endforeach
        @endif

        <a href="{{ route('user.profile', $executor->id) }}"
            class=" mt-4 relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
            Подробнее</a>
    </div>
@endforeach
