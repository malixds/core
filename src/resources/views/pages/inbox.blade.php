@php use App\Models\User; @endphp
@extends('layouts.default')

@section('content')
    <div class="chats">
        <div class="container">
            <div class="chats__inner">
                <div class="row">
                    <div class="col-8">
                        <div class="chats__sea mb-2">
                            <input type="text" class="lock w-full p-2 text-gray-900 border border-gray-300 rounded-lg">
                        </div>
                        @foreach($chats as $chat)
                            @php
                                $buddy = $chat->pivot->user_id === auth()->user()->id ? $chat->pivot->buddy_id : $chat->pivot->user_id;
                                $buddyUser = User::find($buddy);
                                $lastMessage = $chat->lastMessage;
                            @endphp
                            @if($lastMessage)
                                <a href="{{route('chat', ['id' => $chat->id])}}">
                                    <div class="chats__item border-2 mb-2 border-radius-xl d-flex rounded-lg">
                                        <div class="chats__item__info">
                                            <div class="chats__item__name">
                                                {{$buddyUser->name}}
                                            </div>
                                            <div class="chats__item__message">
                                                {{$lastMessage->message}}
                                            </div>
                                        </div>
                                        <div class="chats__item__avatar">
                                            <img src="{{$buddyUser->avatar}}" alt="">
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
