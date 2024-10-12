@extends('layouts.default')

@section('content')
    <section>
        <div class="mx-auto w-full max-w-7xl px-5 pb-16 md:px-10 md:pb-24 lg:pb-32">
            <div class="mx-auto p-8">
                <h2 class="text-3xl mb-[30px] w-full font-semibold md:text-5xl lg:text-left"><span
                            class="bg-cover bg-center bg-no-repeat px-4 text-white bg-[url('https://assets.website-files.com/63904f663019b0d8edf8d57c/6391714b7ac2b51acc1a2548_Rectangle%2017%20(1).svg')]">Let's
                        Build</span> <br>Something <br>Exciting Together
                </h2>
                <p class="mb-6 max-w-lg pb-4 text-[#636262]">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
                    aliquam, purus sit amet luctus venenatis, lectus
                </p>
            </div>
            <div class="flex">
                <div class="mx-auto max-w-xl bg-[#f2f2f7] p-8 text-center rounded-3xl border">
                    <h3 class="text-2xl font-bold md:text-3xl">Get A Free Quote</h3>
                    <p class="mx-auto mb-6 mt-4 max-w-md text-sm text-[#647084]">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit ut
                        aliquam,purus sit amet luctus magna fringilla urna
                    </p>
                    <form name="wf-form-password" class="mb-4 w-full text-left" method="POST"
                          action="{{ route('post.edit', $post->id) }}">
                        <p>POST ID ::: {{$post->id}}</p>
                        @csrf
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Title</label>
                            <input name="title" placeholder="Enter the short information" value="{{$post->title}}"
                                   required
                                   class="h-9 w-full bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900">
                        </div>
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Select subject</label>
                            <select name="subject_id" id="countries" class="text-gray-900 text-sm block w-full p-2.5">
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}" selected>{{$subject->name}}</option>
                                @endforeach
                                <option selected>{{$subject_name}}</option>
                            </select>
                        </div>
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Price</label>
                            <input name="price" placeholder="Enter Price" value="{{$post->price}}" required
                                   class="h-9 w-full bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900">
                        </div>
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Deadline</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-900" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="deadline" datepicker type="text"
                                       class="bg-[#FAFAFA] text-gray-900 text-sm block w-full ps-10 p-2.5"
                                       placeholder="Select date" value="{{$post->deadline}}">
                            </div>
                        </div>
                        <div class="mb-8 flex flex-col gap-y-2">
                            <label for="field-3" class="mb- font-bold">Description</label>
                            <textarea name="description" value="{{$post->description}}"
                                class="h-auto min-h-[186px] w-full overflow-auto bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900"></textarea>
                        </div>
                        <input type="submit" value="Get Started"
                            class="inline-block w-full cursor-pointer rounded-xl bg-black px-8 py-4 text-center font-semibold text-white no-underline [box-shadow:rgb(19,_83,_254)_6px_6px]">
                    </form>
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
