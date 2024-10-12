@extends('layouts.default')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
        <div class="max-w-2xl mx-auto px-4">
            <form action="{{route('review.send', $executor)}}" method="post">
                @csrf
                <div
                    class="py-2 px-4 mb-4 rounded-lg rounded-t-lg border border-gray-200">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea name="review" rows="6"
                              class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none"
                              placeholder="Write a comment..." required></textarea>
                </div>
                <input type="submit"
                       class="bg-primary inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
            </form>
            <article class="mt-10 p-6 text-base bg-white border-t border-gray-200">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold">
                            <img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
                                alt="Helene Engels">Helene Engels</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <time pubdate datetime="2022-06-23"
                                  title="June 23rd, 2022">Jun. 23, 2022
                            </time>
                        </p>
                    </div>
                    <!-- Dropdown menu -->
                </footer>
                <p class="text-gray-500 dark:text-gray-400">Thanks for sharing this. I do came from the Backend
                    development and explored some of the tools to design my Side Projects.</p>
            </article>


            @foreach($reviews as $review)
                <article class="mt-10 p-6 text-base bg-white border-t border-gray-200">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold">
                                <img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
                                    alt="Helene Engels">{{$review->reviewer->name}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <time pubdate datetime="2022-06-23"
                                      title="June 23rd, 2022">{{$review->created_at->diffForHumans()}}
                                </time>
                            </p>
                        </div>
                        <!-- Dropdown menu -->
                    </footer>
                    <p class="text-gray-500 dark:text-gray-400">{{$review->comment}}</p>
                </article>
            @endforeach



        </div>
    </section>
    <div class="max-w-7xl px-5 py-16 md:px-10 md:py-16 lg:py-24 mx-auto">
        <h2 class="executor__name">{{$executor->name}}</h2>
    </div>
@endsection
