@extends('QA-page.main')

@section('main-content')
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
            <ul class="mt-2 flex flex-col overflow-auto h-[80vh]">
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
        <div class="col-span-3 h-full flex flex-col">
            <div class="bg-gray-200 flex-1 overflow-y-scroll">
                <div class="px-4 py-2">
                    <div class="flex items-center mb-2">
                        <img class="w-8 h-8 rounded-full mr-2" src="" alt="User Avatar">
                        <div class="font-medium">John Doe</div>
                    </div>

                    <section id="messages-container" class="h-[70vh]">

                    </section>

                </div>
            </div>
            <div class="bg-gray-100 px-4 py-2">
                <form id="message-form" class="flex items-center">
{{--                    <input type="hidden" name="receiver_id" value="2">--}}
                    <input name="message" class="w-full border rounded-full py-2 px-4 mr-2" type="text" placeholder="Type your message...">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-full">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </section>

    {{--  send-message script  --}}
    <script src="{{ asset('chat/send-message.js') }}"></script>

    {{--  js pusher script  --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{--  open-friend-session script  --}}
    <script src="{{ asset('chat/open-friend-session.js') }}"></script>


@endsection
