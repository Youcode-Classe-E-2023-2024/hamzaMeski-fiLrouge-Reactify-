@extends('friends.main')
@section('main-content')
    <link rel="stylesheet" href="{{asset('friends/css/all-friends.css')}}">

    <div id="imgSrc" imgSrc="{{ asset('http://127.0.0.1:8000/storage/nature.jpg') }}"></div>
    <section class="h-[91vh] grid grid-cols-7 gap-2 h-full w-full bg-gradient-to-b from-gray-800 to-black rounded-lg">
        <div class="col-span-2 bg-gradient-to-b from-gray-900 to-gray-800 text-white p-4 rounded-lg">
            <input type="text" placeholder="Search" class="w-full px-4 py-2 mb-4 rounded-md bg-gray-800 border border-gray-700 focus:outline-none focus:border-blue-500">

            <ul id="all-friends-container" class="h-[78vh] overflow-y-auto">

            </ul>

        </div>

        <div id="user-profile-container" class="col-span-5 h-[91vh] w-full overflow-auto">
        {{--            <h1 class="text-white font-semibold text-2xl">Select people's names to preview their profile.</h1>--}}
        {{--**************************************************************--}}
            <div class="h-full flex items-center justify-center">
                <div class="text-bold text-white text-[30px]">
                    Select people's names to preview their profile.
                </div>
            </div>
        {{--**************************************************************--}}
        </div>
    </section>

    {{-- add-friend script --}}
    <script src="{{asset('friends/js/all-friends.js')}}"></script>
@endsection
