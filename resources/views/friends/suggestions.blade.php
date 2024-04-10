@extends('friends.main')
@section('main-content')
    <section class="h-[91vh] grid grid-cols-7 gap-2 h-full w-full bg-gradient-to-b from-gray-800 to-black rounded-lg">
        <div class="col-span-2 bg-gradient-to-b from-gray-900 to-gray-800 text-white p-4 rounded-lg">
            <input type="text" placeholder="Search" class="w-full px-4 py-2 mb-4 rounded-md bg-gray-800 border border-gray-700 focus:outline-none focus:border-blue-500">
            <ul class="h-[78vh] overflow-y-auto">
                <!-- User Cards -->
                @forelse($users as $user)
                    <li class="flex flex-col items-end justify-between py-2 border-b border-gray-700">
                        <a href="#" class="w-full flex items-center gap-4">
                            <div class="h-12 w-12 rounded-full overflow-hidden">
                                <img src="{{ 'http://127.0.0.1:8000/storage/'.$user->image }}" alt="Profile Picture" class="object-cover h-full w-full">
                            </div>
                            <div>
                                <p class="font-semibold">{{ $user->name }}</p>
                                <p class="text-sm text-gray-400">{{ $user->status }}</p>
                            </div>
                        </a>
                        <div class="flex">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg mr-2">Add Friend</button>
                            <button class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg mr-2">Remove</button>
                        </div>
                    </li>
                @empty
                    <li class="text-gray-400 py-2">No users found</li>
                @endforelse
            </ul>
        </div>


        <div class="col-span-5 h-full w-full flex items-center justify-center">
            <h1 class="text-white font-semibold text-2xl">Select people's names to preview their profile.</h1>
        </div>
    </section>
@endsection
