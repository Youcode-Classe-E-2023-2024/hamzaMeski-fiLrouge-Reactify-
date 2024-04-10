@extends('friends.main')

@section('main-content')
    <section class="h-[91vh] rounded-[30px] bg-gradient-to-b from-gray-800 to-black p-4 overflow-auto">
        <div class="flex items-center justify-between mb-4">
            <div class="font-semibold text-xl text-white">People you may know</div>
            <a href="#" class="text-blue-700">See all</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($users as $user)
                <!-- User Card -->
                <div class="rounded-lg shadow-md flex flex-col items-center gap-2 border border-gray-300 p-4">
                    <div class="h-48 w-full bg-gray-200 rounded-md" style="background-image: url({{'http://127.0.0.1:8000/storage/'.$user->image}}); background-size: cover"></div>
                    <h2 class="font-semibold text-white">{{ $user->name }}</h2>
                    <form action="" class="w-[80%]">
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">Add friend</button>
                    </form>
                    <form action="" class="w-[80%]">
                        <button class="w-full bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">Remove</button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>

@endsection
