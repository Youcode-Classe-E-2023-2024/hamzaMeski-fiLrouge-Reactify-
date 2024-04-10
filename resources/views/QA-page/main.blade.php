@extends('shared.layout')

@section('content')
    <section class="h-[91vh] flex gap-2">
        <section class="h-[91vh] flex">
            <ul class="bg-gradient-to-br from-violet-700 to-red-500 w-[280px] flex flex-col gap-6 rounded-[30px] overflow-hidden border-[1px] border-solid border-gray-700 py-2" style="box-shadow: 8px 7px 11px -6px rgba(180,0,155,0.45);">
                <li class="flex  justify-between px-2 pr-0">
                    <div class="p-1 h-[52px] w-[52px] border-2 border-solid border-gray-400 rounded-full flex items-center justify-center cursor-pointer">
                        <div class="h-full w-full bg-black rounded-full" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.auth()->user()->image )}}'); background-size: cover"></div>
                    </div>
                    <div class="cursor-pointer">
                        <p class="font-bold">{{ auth()->user()->name }}</p>
                        <p class="text-[14px] text-white">Manager</p> <!-- Changed to text-white -->
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="h-full bg-green-500 w-[60px] flex items-center justify-center rounded-tl-[30px] rounded-bl-[30px]">
                            <ion-icon name="arrow-back-outline" class="text-white font-bold text-xl"></ion-icon>
                        </button>
                    </form>

                </li>
                <li class="px-4">
                    <a href="#" class="flex items-center justify-between gap-1 hover:text-blue-500">
                        <ion-icon name="help-circle" class="text-2xl text-white"></ion-icon> <!-- Changed to text-white -->
                        <span class="font-bold text-white" style="text-decoration: underline;">Questions</span> <!-- Changed to text-white -->
                    </a>
                </li>
                <li class="px-4">
                    <a href="#" class="flex items-center justify-between gap-1 hover:text-blue-500">
                        <ion-icon name="pricetags" class="text-xl text-white"></ion-icon> <!-- Changed to text-white -->
                        <span class="font-bold text-white" style="text-decoration: underline;">Tags</span> <!-- Changed to text-white -->
                    </a>
                </li>
                <li class="px-4">
                    <a href="#" class="flex items-center justify-between gap-1 hover:text-blue-500">
                        <ion-icon name="bookmark" class="text-xl text-white"></ion-icon> <!-- Changed to text-white -->
                        <span class="font-bold text-white" style="text-decoration: underline;">Saves</span> <!-- Changed to text-white -->
                    </a>
                </li>
                <li class="px-4">
                    <a href="{{route('friends_home')}}" class="flex items-center justify-between gap-1 hover:text-blue-500">
                        <ion-icon name="people" class="text-xl text-white"></ion-icon> <!-- Changed to text-white -->
                        <span class="font-bold text-white" style="text-decoration: underline;">Friends</span> <!-- Changed to text-white -->
                    </a>
                </li>
                <hr class="border-gray-600">
                <li class="px-4 hover:text-blue-500">
                    <a href="#" class="flex items-center justify-between gap-1 ">
                        <ion-icon name="business" class="text-xl text-green-500"></ion-icon>
                        <span class="font-bold text-white">Companies</span> <!-- Changed to text-white -->
                    </a>
                </li>
                <li class="px-4 flex items-center justify-between gap-20 text-white hover:text-blue-500">
                    <span class=" text-green-500">Labs</span> <!-- Changed to text-white -->
                    <ion-icon name="information-circle" class="text-2xl text-blue-500"></ion-icon>
                </li>
                <li class="px-4">
                    <a href="{{route('chat')}}" class="side_item flex items-center justify-between hover:text-blue-500">
                        <ion-icon name="chatbubbles" class="text-xl text-green-500"></ion-icon> <!-- Changed to text-white -->
                        <span class="font-bold text-white">Discussions</span> <!-- Changed to text-white -->
                        <div class="h-[25px] w-[25px] border border-gray-300 rounded-full bg-red-500 flex items-center justify-center">
                            <div class="text-center text-white">4</div> <!-- Added text-center class -->
                        </div>
                    </a>
                </li>
                <li class="px-4 flex items-center justify-between">
                    <span class="font-bold text-white">Collectives</span> <!-- Changed to text-white -->
                    <ion-icon name="add-circle" class="text-2xl text-blue-500"></ion-icon>
                </li>
                <li class="px-4 text-[12px] text-white">Communities for your favorite technologies.</li> <!-- Changed to text-white -->
                <li class="px-4 text-[14px] font-bold hover:text-blue-500">Explore all collectives</li>
            </ul>
        </section>

        <main class="b h-full w-full overflow-auto">
            @yield('main-content')
        </main>
    </section>
@endsection
