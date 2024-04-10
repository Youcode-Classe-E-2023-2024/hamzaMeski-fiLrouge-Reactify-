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
                    <h1 class="font-bold">Friends</h1>
                </li>
                <li class="px-4">
                    <a href="#" class="flex items-center gap-1 text-white bg-gradient-to-b from-gray-800 to-black p-2 rounded-lg">
                        <div class="flex items-center justify-center p-1 rounded-full bg-red-500">
                            <ion-icon name="people" class="text-2xl"></ion-icon>
                        </div>
                        <span class="font-bold">Home</span>
                    </a>
                </li>
                <li class="px-4">
                    <a href="#" class="flex items-center justify-between text-white">
                        <div class="flex items-center gap-1">
                            <div class="flex items-center justify-center p-1 rounded-full bg-gray-400">
                                <ion-icon name="person-remove" class="text-2xl"></ion-icon>
                            </div>
                            <span class="font-bold">Friend requests</span>
                        </div>
                        <ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
                    </a>
                </li>
                <li class="px-4">
                    <a href="#" class="flex items-center justify-between text-white">
                        <div class="flex items-center gap-1">
                            <div class="flex items-center justify-center p-1 rounded-full bg-gray-400">
                                <ion-icon name="person-add" class="text-2xl"></ion-icon>
                            </div>
                            <span class="font-bold">Suggestions</span>
                        </div>
                        <ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
                    </a>
                </li>
                <li class="px-4">
                    <a href="#" class="flex items-center justify-between text-white">
                        <div class="flex items-center gap-1">
                            <div class="flex items-center justify-center p-1 rounded-full bg-gray-400">
                                <ion-icon name="people-circle" class="text-2xl"></ion-icon>
                            </div>
                            <span class="font-bold">All friends</span>
                        </div>
                        <ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
                    </a>
                </li>
                <hr class="border-gray-600">
                <li class="px-4">
                    <a href="#" class="flex items-center justify-between">
                        <ion-icon name="arrow-back-outline" class="text-xl text-white"></ion-icon>
                    </a>
                </li>
            </ul>
        </section>

        <main class="b h-full w-full overflow-auto">
            @yield('main-content')
        </main>
    </section>
@endsection
