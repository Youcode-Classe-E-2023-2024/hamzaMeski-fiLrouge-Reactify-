@extends('QA-page.main')

@section('main-content')
    {{-- styles links --}}
    <link rel="stylesheet" href="{{asset('chat/css/open-friend-session.css')}}">
    <link rel="stylesheet" href="{{asset('chat/css/style.css')}}">

    <section class="grid grid-cols-4 gap-2 h-full w-full">
        <div class="col-span-1 bg-red-">
            <div class="rounded-full py-2 px-10 flex items-center justify-between" style="background: rgba(224,17,59,0.88);background: linear-gradient(90deg, rgba(0,7,36,0.82) 0%, rgba(118,9,121,1) 35%, rgba(255,72,0,1) 100%);">
                <a href="#" class="flex flex-col items-center justify-center text-blue-700">
                    <ion-icon name="person" class="text-3xl"></ion-icon>
                    <span class="text-[12px]">friends</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center">
                    <ion-icon name="people" class="text-3xl text-white"></ion-icon>
                    <span class="text-white text-[12px]">groups</span>
                </a>
            </div>
            <ul class="mt-2 flex flex-col overflow-auto h-[75vh]">
                @forelse($friends as $friend)
                    <li>
                        <a href="#" receiverId="{{$friend->id}}" class="friends py-1 flex items-center justify-between border-b border-gray-300">
                            <div class="flex items-center justify-between gap-2">
                                <div class="p-1 h-[52px] w-[52px] border-2 border-solid border-gray-400 rounded-full flex items-center justify-center cursor-pointer">
                                    <div class="h-full w-full bg-black rounded-full" style="background-image: url({{'http://127.0.0.1:8000/storage/'.$friend->image}}); background-size: cover"></div>
                                </div>
                                <div class="cursor-pointer">
                                    <p class="font-bold">{{$friend->name}}</p>
                                    <p class="text-[14px]">How are you Hamza ...</p> <!-- Changed to text-white -->
                                </div>
                            </div>
                            <div>10:13</div>
                        </a>
                    </li>
                @empty
                    <div>You don't have a friend yet</div>
                @endforelse
            </ul>
        </div>
        <div id="chat-container" class="col-span-3 flex flex-col h-[91vh]">
            <div class="flex items-center bg-gray-300 py-2">
                <div id="receiver-image" class="w-10 h-10 rounded-full mr-2" style="" ></div>
                <div id="receiver-name" class="font-medium">John Doe</div>
            </div>

            <section id="messages-container" class="flex-1 overflow-auto bg-gray-200 px-2">
                <!-- Content goes here -->
            </section>

            <div class="bg-gray-100 px-4 py-2">
                <form id="message-form" class="flex items-center">
                    <input id="message-input" name="message" class="w-full border rounded-full py-2 px-4 mr-2" type="text" placeholder="Type your message...">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-full">
                        Send
                    </button>
                </form>
            </div>
        </div>
        <div id="empty-chat-container" class="col-span-3 bg-red-500 gap-1 h-[91vh]">
            <h1>start a discussion!</h1>
        </div>

    </section>

    {{--  js pusher script  --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{--  send-message script  --}}
    <script src="{{ asset('chat/js/send-message.js') }}"></script>

    {{--  open-friend-session script  --}}
    <script src="{{ asset('chat/js/open-friend-session.js') }}"></script>


@endsection
