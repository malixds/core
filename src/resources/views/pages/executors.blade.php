@extends('layouts.default')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="max-w-7xl px-5 py-16 md:px-10 md:py-16 lg:py-24 mx-auto">

        <div class="mx-auto w-full max-w-3xl text-center" data-aos="fade-up" data-aos-duration="900">
            <h2 class="text-3xl font-semibold md:text-5xl">
                Make every step
                <span
                    class="bg-cover bg-center bg-no-repeat px-4 text-white bg-[url('https://assets.website-files.com/63904f663019b0d8edf8d57c/63915f9749aaab0572c48dae_Rectangle%2018.svg')]">user-centric</span>
            </h2>
            <div class="mx-auto mb-8 mt-4 max-w-[528px] md:mb-12 lg:mb-16">
                <p class="text-[#636262]">
                    Lorem ipsum dolor sit amet consectetur adipiscing elit ut
                    aliquam,purus sit amet luctus magna fringilla urna
                </p>
            </div>
        </div>
        <div class="mx-auto w-full max-w-3xl">
            <select id="executors__selector" class="js-example-basic-multiple executors__selector" name="states[]"
                multiple="multiple">
                @foreach ($subjects as $subject)
                <option value="{{$subject->name}}">{{$subject->name}}</option>
                @endforeach
                <option value="Математика">Математика</option>
                <option value="Литература">Литература</option>
                <option value="Русский язык">История</option>
            </select>
        </div>
        <!-- Features Div -->
        <div id="executors-container" class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 md:grid-cols-3 lg:gap-12"
            data-aos="fade-up" data-aos-duration="900">
            <!-- Feature Item -->
            @if (isset($subjectsValues))
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
                            {{-- @if (auth()->user() != null)
                                @if ($post->user->id === $user->id || $user->roles->first()->name === 'admin')
                                    <a href="{{ route('post.edit-show', $post->id) }}"><i
                                            class="mt-1 fa-solid fa-pen-to-square"></i></a>
                                    <form class="inline" action="{{ route('post.delete', $post->id) }}" method="POST">
                                        @method('post')
                                        @csrf
                                        <button type="submit"><i class="mt-1 fa-solid fa-trash"></i></button>
                                    </form>
                                @endif
                            @endif --}}
                        </div>

                        <p>
                            {{ $executor->description }}
                        </p>
                        {{-- <p>
                            Subject: {{ $executor->subject->name }}
                        </p> --}}
                        <a href="{{ route('executor.profile', $executor->id) }}"
                            class=" mt-4 relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                            Подробнее</a>
                    </div>
                @endforeach
            @else
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
                            {{-- @if (auth()->user() != null)
                                @if ($post->user->id === $user->id || $user->roles->first()->slug === 'admin')
                                    <a href="{{ route('post.edit-show', $post->id) }}"><i
                                            class="mt-1 fa-solid fa-pen-to-square"></i></a>
                                    <form class="inline" action="{{ route('post.delete', $post->id) }}" method="POST">
                                        @method('post')
                                        @csrf
                                        <button type="submit"><i class="mt-1 fa-solid fa-trash"></i></button>
                                    </form>
                                @endif
                            @endif --}}
                        </div>

                        <p>
                            {{ $executor->description }}
                        </p>
                        @if ($executor->subjects)
                        @foreach ($executor->subjects as $subject)
                            <p>{{$subject->name}}</p>
                        @endforeach
                        @endif
                        <a href="{{ route('executor.profile', $executor->id) }}"
                            class=" mt-4 relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                            Подробнее</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    </section>


    <header class="w-full">
        <!-- Container -->
        <div class="px-5 py-16 md:px-10 max-w-7xl md:py-16 lg:py-24 mx-auto" data-aos="fade-up" data-aos-duration="900">
            <!-- Component -->
            <div
                class="w-full mx-auto max-w-7xl rounded-[48px] bg-cover bg-center bg-no-repeat py-20 px-5 text-white [box-shadow:rgb(106,_218,_255)_9px_9px] bg-[url('https://firebasestorage.googleapis.com/v0/b/flowspark-1f3e0.appspot.com/o/6391a6daa19785eb51dd3666_CTA%20(2)%20(1).svg?alt=media&token=b877deae-f9fb-4f75-ad69-cbc62e593e50')]">
                <div class="mx-auto max-w-3xl text-center">
                    <!-- Heading Div -->
                    <div class="mb-6 max-w-[720px] lg:mb-12">
                        <h2 class="mb-4 text-3xl font-semibold md:text-5xl">
                            <span
                                class="bg-cover bg-center px-4 text-white bg-[ background-image: url('https://assets.website-files.com/63904f663019b0d8edf8d57c/6391a5b04f2836ad87dcc3bc_Rectangle%20773.svg')]">Lightning
                                Fast</span>&nbsp;Webflow Dev Made Easy
                        </h2>
                        <div class="mx-auto max-w-[630px]">
                            <p class="text-[#e0e0e0]">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
                                aliquam, purus sit amet luctus venenatis, lectus magna
                                fringilla urna
                            </p>
                        </div>
                    </div>
                    <!-- CTA -->
                    <a href="#"
                        class="inline-block rounded-xl bg-black px-8 py-4 font-semibold text-white [box-shadow:rgb(255,_255,_255)_6px_6px]">Get
                        Started</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer Standard Email V2 -->
@endsection
