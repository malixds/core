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
            <h1>{{ $user->name }}</h1>
            <div class="flex">
                <div class="mx-auto max-w-xl bg-[#f2f2f7] p-8 text-center rounded-3xl border">
                    <h3 class="text-2xl font-bold md:text-3xl">Get A Free Quote</h3>
                    <p class="mx-auto mb-6 mt-4 max-w-md text-sm text-[#647084]">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit ut
                        aliquam,purus sit amet luctus magna fringilla urna
                    </p>
                    <ul class="tags">
                        @foreach ($subjectsArr as $subject)
                            <li class="pl-5 tag-li">
                                <form class="inline"
                                      action="{{ route('user.profile-form-delete-subject', $subject->id) }}"
                                      method="POST">
                                    @method('post')
                                    @csrf
                                    <button type="submit">x</button>
                                </form>
                                <p class="tag">{{ $subject->name }}</p>
                            </li>
                        @endforeach
                    </ul>
                    <form name="wf-form-password" class="mb-4 w-full text-left" method="POST"
                          action="{{ route('user.profile-form-create', $user->id) }}">
                        @csrf
                        <div class="mb-8 flex flex-col gap-y-2">
                            <label for="field-3" class="mb- font-bold">Description</label>
                            <textarea name="description" value="{{ $user->description }}"
                                      placeholder="Enter some information about yourself"
                                      class="h-auto min-h-[186px] w-full overflow-auto bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900"></textarea>
                        </div>
                        <div class="mx-auto w-full max-w-3xl">
                            <select id="posts__selector posts__selector-form"
                                    class="js-example-basic-multiple posts__selector" name="subjects[]"
                                    multiple="multiple">
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->name}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Telegram</label>
                            <input name="contact_link" value="{{ $user->contact_link }}"
                                   placeholder="Enter Telegram Nickname" required
                                   class="h-9 w-full bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900">
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
