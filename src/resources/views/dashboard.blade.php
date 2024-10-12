<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white shadow-sm sm:rounded-lg lg:py-10">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <a href="{{route('main')}}" class="m-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Home
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
