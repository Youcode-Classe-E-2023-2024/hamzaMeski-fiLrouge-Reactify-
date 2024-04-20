@extends('friends.main')

@section('main-content')
    <section id="friends-home-container" class="bg-gradient-to-b from-gray-800 to-black p-4 overflow-auto">
        <div class="flex items-center justify-between mb-4">
            <div class="font-semibold text-xl text-white">People you may know</div>
            <a href="{{ route('suggestions') }}" class="text-blue-700">See all</a>
        </div>

        <div id="users-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">

        </div>

    </section>

    <script src="{{asset('friends/js/add-friend.js')}}"></script>
@endsection
