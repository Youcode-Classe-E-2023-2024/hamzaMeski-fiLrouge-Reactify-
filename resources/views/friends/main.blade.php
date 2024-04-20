@extends('shared.layout')

@section('content')
    <div class="grid gap-4 md:grid-cols-4 sm:p-4 lg:px-16 lg:py-4">
        <div class="flex-col p-8 py-16 hover:scale-[1.05] transition duration-300 ease-in-out rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
            <p class="flex items-center justify-center text-4xl font-semibold text-green-400 bg-green-800 rounded-full shadow-lg w-14 h-14">
                <ion-icon name="home" class="text-2xl"></ion-icon>
            </p>
            <div class="h-6"></div>
            <a href="{{ route('friends_home') }}" class="font-serif text-3xl {{$clicked === 'home' ? ' text-green-400': 'text-gray-300'}}">Home</a>
        </div>
        <div class="flex-col p-8 py-16 hover:scale-[1.05] transition duration-300 ease-in-out rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
            <p class="flex items-center justify-center text-4xl font-semibold text-green-400 bg-green-800 rounded-full shadow-lg w-14 h-14">
                <ion-icon name="person-add" class="text-2xl"></ion-icon>
            </p>
            <div class="h-6"></div>
            <a href="{{ route('friend_requests_index') }}" class="font-serif text-3xl {{$clicked === 'friend-requests' ? ' text-green-400': 'text-gray-300'}}">Requests</a>
        </div>
        <div class="flex-col p-8 py-16 hover:scale-[1.05] transition duration-300 ease-in-out rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
            <p class="flex items-center justify-center text-4xl font-semibold text-green-400 bg-green-800 rounded-full shadow-lg w-14 h-14">
                <ion-icon name="people" class="text-2xl"></ion-icon>
            </p>
            <div class="h-6"></div>
            <a href="{{ route('all_friends_index') }}" class="font-serif text-3xl {{$clicked === 'all-friends' ? ' text-green-400': 'text-gray-300'}}">All friends</a>
        </div>
        <div class="flex-col p-8 py-16 hover:scale-[1.05] transition duration-300 ease-in-out rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
            <p class="flex items-center justify-center text-4xl font-semibold text-green-400 bg-green-800 rounded-full shadow-lg w-14 h-14">
                <ion-icon name="person-add" class="text-2xl"></ion-icon>
            </p>
            <div class="h-6"></div>
            <a href="{{ route('suggestions') }}" class="font-serif text-3xl {{$clicked === 'suggestions' ? ' text-green-400': 'text-gray-300'}}">Suggestions</a>
        </div>
    </div>

    <div class="text-center py-4">
        <a href="#friends-blade">
            <ion-icon name="chevron-down-circle" class="text-4xl text-green-500 cursor-pointer"></ion-icon>
        </a>
    </div>

    <main id="friends-blade" class="b h-full w-full overflow-auto">
        @yield('main-content')
    </main>
@endsection
