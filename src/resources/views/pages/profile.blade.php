@extends('layouts.default')

@section('content')

    {{$user->name}}
    <div class="max-w-7xl px-5 py-16 md:px-10 md:py-16 lg:py-24 mx-auto">
        <header class="w-full">
            <!-- Container -->
            <div class="px-5 py-16 md:px-10 max-w-7xl md:py-16 lg:py-24 mx-auto" data-aos="fade-up"
                 data-aos-duration="900">
                <!-- Component -->
                <div
                        class="w-full mx-auto max-w-7xl rounded-[48px] bg-cover bg-center bg-no-repeat py-20 px-5 text-white [box-shadow:rgb(106,_218,_255)_9px_9px] bg-[url('https://firebasestorage.googleapis.com/v0/b/flowspark-1f3e0.appspot.com/o/6391a6daa19785eb51dd3666_CTA%20(2)%20(1).svg?alt=media&token=b877deae-f9fb-4f75-ad69-cbc62e593e50')]">
                    <div class="mx-auto max-w-3xl text-center">
                        <!-- Heading Div -->
                        <div class="mb-6 max-w-[720px] lg:mb-12">
                            <h2 class="mb-4 text-3xl font-semibold md:text-5xl">
                                <span
                                        class="bg-cover bg-center px-4 text-white bg-[ background-image: url('https://assets.website-files.com/63904f663019b0d8edf8d57c/6391a5b04f2836ad87dcc3bc_Rectangle%20773.svg')]">Your Profile
                                </span>
                            </h2>
                            <div class="mx-auto max-w-[630px]">
                                <p class="text-[#e0e0e0]">
                                    Here you can find your sent tasks and orders that you made a responce
                                </p>
                            </div>
                        </div>
                        <!-- CTA -->
                        @if ($user)
                            @if (!$user->isWorker())
                                <div class="mx-auto max-w-3xl text-center">
                                    <h1>Вы не можете выполнять задания для этого заполните анкету</h1>
                                    <a href="{{ route('user.profile-form', $user->id) }}"
                                       class="mt-5 inline-block rounded-xl bg-black px-8 py-4 font-semibold text-white [box-shadow:rgb(255,_255,_255)_6px_6px]">
                                        Заполнить анкету
                                    </a>
                                </div>
                            @else
                                <h1>Вы можете выполнять задания</h1>
                                <a href="{{ route('user.profile-form', $user->id) }}"
                                   class="mt-5 inline-block rounded-xl bg-black px-8 py-4 font-semibold text-white [box-shadow:rgb(255,_255,_255)_6px_6px]">
                                    Смотреть анкету
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <div class="mx-auto w-full max-w-3xl text-center" data-aos="fade-up" data-aos-duration="900">
            <h2 class="text-3xl font-semibold md:text-5xl">
                Ваши
                <span
                        class="bg-cover bg-center bg-no-repeat px-4 text-white bg-[url('https://assets.website-files.com/63904f663019b0d8edf8d57c/63915f9749aaab0572c48dae_Rectangle%2018.svg')]">задания</span>
            </h2>
            <div class="mx-auto mb-8 mt-4 max-w-[528px] md:mb-12 lg:mb-16">
                <p class="text-[#636262]">
                    Здесь отображаются выложенные вами задания отредактируйте их или удалите при необходимости<br>По
                    закрытии задания задания удалится автоматически
                </p>
            </div>
        </div>

        <div id="posts-container" class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 md:grid-cols-3 lg:gap-12 mt-5"
             data-aos="fade-up" data-aos-duration="900">
            @foreach ($myPosts as $post)
                <div
                        class="relative mb-8 flex flex-col rounded-2xl border border-solid border-black p-8 [box-shadow:rgb(0,_0,_0)_9px_9px] lg:mb-4">
                    <div
                            class="absolute -top-8 bottom-auto left-auto right-4 flex h-16 w-16 flex-col items-center justify-center rounded-full border border-solid border-[#9b9b9b] bg-white [box-shadow:rgb(0,_0,_0)_0px_5px] lg:right-8">
                        <img
                                src="https://assets.website-files.com/63904f663019b0d8edf8d57c/639157f1a197859a6cd7f265_image%203.png"
                                alt="" class="relative z-10 inline-block h-8"/>
                        <div class="absolute z-0 h-8 w-8 rounded-full border border-[#c0d1ff] bg-[#c0d1ff]">
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p class="mb-4 text-xl font-semibold">
                            {{ $post->title }}
                        </p>
                        @if (auth()->user() != null)
                            @if ($post->user->id == $user->id || $user->roles->first()->name === 'admin')
                                <a href="{{ route('post.edit-show', $post->id) }}"><i
                                            class="mt-1 fa-solid fa-pen-to-square"></i>edit</a>
                                <form class="inline" action="{{ route('post.delete', $post->id) }}" method="POST">
                                    @method('post')
                                    @csrf
                                    <button type="submit"><i class="mt-1 fa-solid fa-trash"></i>x</button>
                                </form>
                            @endif
                        @endif
                    </div>

                    <p>
                        {{ $post->description }}
                    </p>
                    <p>
                        Subject: {{ $post->subject->name }}
                    </p>
                    <p>
                        Creator: {{ $post->user->name }}
                    </p>
                    Отклики: {{ $post->responce }}
                    <a href="{{ route('post.show-full', $post->id) }}"
                       class=" mt-4 relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                        Подробнее</a>
                </div>
            @endforeach
        </div>

        <div class="mt-20 mx-auto w-full max-w-3xl text-center" data-aos="fade-up" data-aos-duration="900">
            <h2 class="text-3xl font-semibold md:text-5xl">
                Ваши
                <span
                        class="bg-cover bg-center bg-no-repeat px-4 text-white bg-[url('https://assets.website-files.com/63904f663019b0d8edf8d57c/63915f9749aaab0572c48dae_Rectangle%2018.svg')]">заказы</span>
            </h2>
            <div class="mx-auto mb-8 mt-4 max-w-[528px] md:mb-12 lg:mb-16">
                <p class="text-[#636262]">
                    Здесь отображаются задания пользователей, на которые вы откликнулись
                </p>
            </div>
        </div>

        <div id="posts-container" class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 md:grid-cols-3 lg:gap-12 mt-5"
             data-aos="fade-up" data-aos-duration="900">
            @foreach ($myTasks as $task)
                <div
                        class="relative mb-8 flex flex-col rounded-2xl border border-solid border-black p-8 [box-shadow:rgb(0,_0,_0)_9px_9px] lg:mb-4">
                    <div
                            class="absolute -top-8 bottom-auto left-auto right-4 flex h-16 w-16 flex-col items-center justify-center rounded-full border border-solid border-[#9b9b9b] bg-white [box-shadow:rgb(0,_0,_0)_0px_5px] lg:right-8">
                        <img
                                src="https://assets.website-files.com/63904f663019b0d8edf8d57c/639157f1a197859a6cd7f265_image%203.png"
                                alt="" class="relative z-10 inline-block h-8"/>
                        <div class="absolute z-0 h-8 w-8 rounded-full border border-[#c0d1ff] bg-[#c0d1ff]">
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p class="mb-4 text-xl font-semibold">
                            {{ $task->title }}
                        </p>
                        @if (auth()->user() !== null)
                            @if ($task->user->id == $user->id || $user->isAdmin())
                                <a href="{{ route('post.edit-show', $task->id) }}"><i
                                            class="mt-1 fa-solid fa-pen-to-square"></i>edit</a>
                                <form class="inline" action="{{ route('post.delete', $task->id) }}" method="POST">
                                    @method('post')
                                    @csrf
                                    <button type="submit"><i class="mt-1 fa-solid fa-trash"></i>x</button>
                                </form>
                            @endif
                        @endif
                    </div>

                    <p>
                        {{ $task->description }}
                    </p>
                    <p>
                        Subject: {{ $task->subject->name }}
                    </p>
                    <p>
                        Creator: {{ $task->user->name }}
                    </p>
                    Отклики: {{ $task->responce }}

{{--                        <?php--}}
{{--                        $executor = auth()->user()->find($task->pivot->executor_id)--}}
{{--                        ?>--}}

                    @if ($task->isAgreed())

                        <form method="post"
                              action="{{route('post.confirm', ['post' => $task])}}">
                            @csrf
                            <button type="submit"
                                    class=" mt-4 relative inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                                Выполнено
                            </button>
                        </form>

                        <form method="post"
                              action="{{route('post.reject', ['post' => $post])}}">
                            @csrf
                            <button type="submit"
                                    class=" mt-4 relative inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                                Отказать
                            </button>
                        </form>

                    @endif

                    <a href="{{ route('post.show-full', $task->id) }}"
                       class=" mt-4 relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                        Подробнее</a>
                </div>
            @endforeach
        </div>


        <div class="mx-auto w-full max-w-3xl text-center" data-aos="fade-up" data-aos-duration="900">
            <h2 class="text-3xl font-semibold md:text-5xl">
                Ваши
                <span
                        class="bg-cover bg-center bg-no-repeat px-4 text-white bg-[url('https://assets.website-files.com/63904f663019b0d8edf8d57c/63915f9749aaab0572c48dae_Rectangle%2018.svg')]">задания</span>
            </h2>
            <div class="mx-auto mb-8 mt-4 max-w-[528px] md:mb-12 lg:mb-16">
                <p class="text-[#636262]">
                    Здесь отображаются ваши задания, на которые откликнулись другие пользователи
                </p>
            </div>
        </div>

        <div id="posts-container" class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 md:grid-cols-3 lg:gap-12 mt-5"
             data-aos="fade-up" data-aos-duration="900">
            @foreach ($myAcceptedPosts as $post)
                <div
                        class="relative mb-8 flex flex-col rounded-2xl border border-solid border-black p-8 [box-shadow:rgb(0,_0,_0)_9px_9px] lg:mb-4">
                    <div
                            class="absolute -top-8 bottom-auto left-auto right-4 flex h-16 w-16 flex-col items-center justify-center rounded-full border border-solid border-[#9b9b9b] bg-white [box-shadow:rgb(0,_0,_0)_0px_5px] lg:right-8">
                        <img
                                src="https://assets.website-files.com/63904f663019b0d8edf8d57c/639157f1a197859a6cd7f265_image%203.png"
                                alt="" class="relative z-10 inline-block h-8"/>
                        <div class="absolute z-0 h-8 w-8 rounded-full border border-[#c0d1ff] bg-[#c0d1ff]">
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p class="mb-4 text-xl font-semibold">
                            {{ $post->title }}
                        </p>
                        @if (auth()->user() != null)
                            @if ($post->user->id == $user->id || $user->roles->first()->name === 'admin')
                                <a href="{{ route('post.edit-show', $post->id) }}"><i
                                            class="mt-1 fa-solid fa-pen-to-square"></i>edit</a>
                                <form class="inline" action="{{ route('post.delete', $post->id) }}" method="POST">
                                    @method('post')
                                    @csrf
                                    <button type="submit"><i class="mt-1 fa-solid fa-trash"></i>x</button>
                                </form>
                            @endif
                        @endif
                    </div>
                    <p>
                        {{ $post->description }}
                    </p>
                    <p>
                        <a href="{{ route('executor.profile', $post->pivot->executor_id) }}">
                                <?php
                                $executor = auth()->user()->find($post->pivot->executor_id);
                                ?>
                            {{$executor->name}}
                        </a>
                        <br>
                    <div class="">
                        @if($post->isAgreed() || $post->isConfirmed())
                            <p>Задание выполняется | другие пользователи не могут отлкикнуться на него</p>
                        @endif
                        <div class="flex mb-4">
                            <form method="post"
                                  action="{{route('post.agree', ['post' => $post, 'executorId' => $executor->id])}}">
                                @csrf
                                <button type="submit"
                                        class=" mt-4 relative inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                                    Принять
                                </button>
                            </form>

                            <form method="post"
                                  action="{{route('post.reject', ['post' => $post, 'executorId' => $executor->id])}}">
                                @csrf
                                <button type="submit"
                                        class=" mt-4 relative inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                                    Отказать
                                </button>
                            </form>

                        </div>
                        <div class="flex">
                            <a href="{{ route('post.show-full', $post->id) }}"
                               class=" mt-4 relative inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                                Подробнее</a>

                            <a href="{{ route('chat.create', ['post' => $post, 'executorId' => $executor->id]) }}"
                               class="relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                                Перейти в чат
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
