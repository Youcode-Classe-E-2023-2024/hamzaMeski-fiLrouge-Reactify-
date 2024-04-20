@extends('QA-page.main')

@section('main-content')
    <link rel="stylesheet" href="{{asset('chat/css/open-friend-session.css')}}">
    <link rel="stylesheet" href="{{asset('chat/css/style.css')}}">
    <section id="friends-chat-container" class=" grid grid-cols-1 md:grid-cols-4 gap-2">
        <div class="col-span-1 md:col-span-1 bg-gradient-to-br from-gray-900 to-black backdrop-blur-md">
            <div class="h-[56px] py-2 px-10 flex items-center justify-between">
                <a href="#" class="flex flex-col items-center justify-center text-blue-700">
                    <ion-icon name="person" class="text-3xl"></ion-icon>
                    <span class="text-[12px]">friends</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center">
                    <ion-icon name="people" class="text-3xl text-white"></ion-icon>
                    <span class="text-white text-[12px]">groups</span>
                </a>
            </div>
            <div class="dark:text-white pr-1">
                <input type="text" class="bg-gray-700 text-white placeholder-gray-400 border border-gray-600 rounded-md py-2 px-4 focus:outline-none focus:border-green-500 w-full" placeholder="Search...">
            </div>
            <ul id="friends-container" class=" mt-2 flex flex-col h-[70vh] overflow-auto">
                @forelse($friends as $friend)
                    <li>
                        <a href="#" receiverId="{{$friend->id}}" class="friends py-1 flex items-center justify-between border-b border-gray-300">
                            <div class="flex items-center justify-between gap-2">
                                <div class="p-1 h-[52px] w-[52px] border-2 border-solid border-gray-400 rounded-full flex items-center justify-center cursor-pointer">
                                    <div class="h-full w-full bg-black rounded-full" style="background-image: url({{'http://127.0.0.1:8000/storage/'.$friend->image}}); background-size: cover"></div>
                                </div>
                                <div class="cursor-pointer">
                                    <p class="font-bold text-white">{{$friend->name}}</p>
                                    <p class="text-[14px] text-white">How are you Hamza ...</p> <!-- Changed to text-white -->
                                </div>
                            </div>
                            <div class="text-white">10:13</div>
                        </a>
                    </li>
                @empty
                    <div class="text-white">You don't have a friend yet</div>
                @endforelse
            </ul>
        </div>
        <div id="chat-container" class="col-span-1 md:col-span-3 flex flex-col bg-gradient-to-br from-gray-900 to-black backdrop-blur-md">
            <div class="flex items-center py-2 border-b border-gray-500">
                <div id="receiver-image" class="w-10 h-10 rounded-full mr-2 border border-gray-300"></div>
                <div id="receiver-name" class="font-medium text-gray-300"></div>
            </div>

            <section id="messages-container" class="flex-1 overflow-auto  px-2">
                <!-- Content goes here -->
            </section>

            <div class="px-4 py-2 border-t border-gray-500">
                <form id="message-form" class="flex items-center">
                    <input id="message-input" name="message" class="w-full border-2 rounded-full py-2 px-4 mr-2 bg-gray-200 text-gray-600 focus:outline-none focus:border-green-500" type="text" placeholder="Type your message...">
                    <button type="submit" class=" text-white font-medium h-[50px] w-[50px] rounded-full" title="send message">
                        <ion-icon name="send" class="text-4xl text-green-400"></ion-icon>
                    </button>
                </form>
            </div>
        </div>
    </section>


    {{--    scripts section --}}
    @if(isset($receiverId))
        <script>
            localStorage.setItem('receiverId', {{$receiverId->id}});
            console.log('ok');
        </script>
    @endif

    <script>
        const friendsChatContainer = document.getElementById('friends-chat-container');
        friendsChatContainer.classList.add(`h-[${innerHeight - 50}px]`);
    </script>

{{--      js pusher script--}}
    <script src="{{ asset('js/app.js') }}"></script>

{{--      send-message script--}}
    <script src="{{ asset('chat/js/send-message.js') }}"></script>

{{--      open-friend-session script--}}
    <script src="{{ asset('chat/js/open-friend-session.js') }}"></script>


@endsection
