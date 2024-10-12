@extends('layouts.default')

@section('content')
    <section>
        <div data-aos="fade-up" data-aos-duration="900" class="mx-auto w-full max-w-5xl px-5 pb-16 md:px-10 md:pb-24 lg:pb-32">
            <div class="mx-auto mb-8 w-full max-w-3xl text-center">
                <h2 class="text-3xl font-semibold md:text-5xl">
                    Make Every Step
                    <span
                        class="bg-cover bg-center bg-no-repeat px-4 text-white bg-[url('https://assets.website-files.com/63904f663019b0d8edf8d57c/63915f9749aaab0572c48dae_Rectangle%2018.svg')]">User-Centric</span>
                </h2>
                <p class="mx-auto mt-4 max-w-[528px] text-[#636262] md:mb-12 lg:mb-16">
                    Lorem ipsum dolor sit amet consectetur adipiscing elit ut
                    aliquam,purus sit amet luctus magna fringilla urna
                </p>
            </div>
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-20">
                <div class="flex flex-col items-start">
                    <a
                        class="lg:w-full sm:w-8/12 my-4 flex max-w-[480px] items-center rounded-xl border border-solid border-[#4273f6] bg-[#4273f6] p-6 font-bold text-white [box-shadow:rgb(0,_0,_0)_-4px_4px]">
                        <div
                            class="relative mr-2 flex h-14 w-14 flex-none flex-col items-center justify-center rounded-md border border-[#9b9b9b] bg-white [box-shadow:rgb(0,_0,_0)_2px_2px]">
                            <img alt
                                src="https://assets.website-files.com/63904f663019b0d8edf8d57c/6391586264bf263c3a734e6d_Group%2047875.png"
                                class="inline-block h-8">
                        </div>
                        <div class="">
                            <p class="ml-4 text-sm font-normal ">
                                Author: {{ $post->user->name }}
                            </p>
                            <p class="ml-4 text-sm font-normal ">
                                5/5
                            </p>
                        </div>


                    </a>
                    <a
                        class="lg:w-full sm:w-8/12 my-4 flex max-w-[480px] items-center rounded-xl border border-solid border-black p-6 font-bold [box-shadow:rgb(0,_0,_0)_-4px_4px]">
                        <div
                            class="relative mr-2 flex h-14 w-14 flex-none flex-col items-center justify-center rounded-md border border-[#9b9b9b] bg-white [box-shadow:rgb(0,_0,_0)_2px_2px]">
                            <img alt
                                src="https://assets.website-files.com/63904f663019b0d8edf8d57c/6391586264bf263c3a734e6d_Group%2047875.png"
                                class="inline-block h-8">
                        </div>
                        <div class="">
                            <p class="ml-4 text-sm font-normal">
                                {{ $post->title }}
                            </p>
                            <p class="ml-4 text-sm font-normal">
                                {{ $post->subject->name }}
                            </p>
                        </div>
                    </a> <a
                        class="lg:w-full sm:w-8/12 my-4 flex max-w-[480px] items-center rounded-xl border border-solid border-black p-6 font-bold [box-shadow:rgb(0,_0,_0)_-4px_4px]">
                        <div
                            class="relative mr-2 flex h-14 w-14 flex-none flex-col items-center justify-center rounded-md border border-[#9b9b9b] bg-white [box-shadow:rgb(0,_0,_0)_2px_2px]">
                            <img alt
                                src="https://assets.website-files.com/63904f663019b0d8edf8d57c/6391586264bf263c3a734e6d_Group%2047875.png"
                                class="inline-block h-8">
                        </div>
                        <div class="">
                            <p class="ml-4 text-sm font-normal">
                                {{ $post->description }}
                            </p>
                        </div>
                    </a>
                    <div class="flex flex-col space-y-8 lg:flex lg:flex-row lg:space-x-3 lg:space-y-0">
                        <a href="{{ route('chat.create', ['post' => $post]) }}"
                            class="relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">
                            Write to customer
                        </a>
                        {{$post_id}}
                        <form action="{{route('post.accept', $post_id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button type='submit'
                                class="relative mr-5 inline-block rounded-xl border border-[#1353FE] bg-white px-8 py-4 text-center font-semibold text-[#1353FE] [box-shadow:rgb(0,0,0)_6px_6px] hover:border-black md:mr-6">Take task</button>
                        </form>
                    </div>
                </div>
                <div class="overflow-hidden relative left-4 max-h-[500px] max-w-[500px] md:left-0"><img
                        src="https://assets.website-files.com/63904f663019b0d8edf8d57c/63915d207ab06a43d5e4aadd_magicpattern-jbywvpa9vH8-unsplash.jpg"
                        alt class="mx-auto block h-full w-full max-w-[800px] rotate-[3.5deg] rounded-2xl object-cover">
                    <div class="absolute bottom-0 left-[-16px] right-0 top-4 -z-10 h-full w-full rounded-2xl bg-black">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
