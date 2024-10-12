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
                          action="{{ route('user.profile-form-create', $user->id) }}">
                        @csrf
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Nickname</label>
                            <input name="contact_link" value="{{ $user->name }}"
                                   placeholder="Enter Telegram Nickname" required
                                   class="h-9 w-full bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900">
                        </div>
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Email</label>
                            <input name="contact_link" value="{{ $user->email }}"
                                   placeholder="Enter Telegram Nickname" required
                                   class="h-9 w-full bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900">
                        </div>
                        <div class="mb-4 flex justify-between">
                            <div class="col-10">
                                <label for="name-2" class="mb-1 font-bold">Telegram</label>
                                <input name="contact_link" value="********"
                                       placeholder="Enter Telegram Nickname" required
                                       class="h-9 w-full bg-gray-300 px-3 py-6 text-sm text-gray-900" disabled>
                            </div>
                            <!-- Button trigger modal -->
                            <button id="myBtn">Open Modal</button>
                        </div>
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Telegram</label>
                            <input name="contact_link" value="{{ $user->contact_link }}"
                                   placeholder="Enter Telegram Nickname" required
                                   class="h-9 w-full bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900">
                        </div>
                        <input type="submit" value="Save"
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

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="{{route('user.profile-settings-password', $user)}}">
                        @csrf
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">Your password</label>
                            <input name="contact_link" value="{{ $user->contact_link }}"
                                   placeholder="Enter Telegram Nickname" required
                                   class="h-9 w-full bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900">
                        </div>
                        <div class="mb-4 flex flex-col gap-y-2">
                            <label for="name-2" class="mb-1 font-bold">New password</label>
                            <input name="contact_link" value="{{ $user->contact_link }}"
                                   placeholder="Enter Telegram Nickname" required
                                   class="h-9 w-full bg-[#FAFAFA] px-3 py-6 text-sm text-gray-900">
                        </div>
                        <input type="submit" class="btn btn-primary">Save
                    </form>
                </div>
            </div>
        </div>


    </section>

    <style>
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 50% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <script>
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection
