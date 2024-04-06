@extends('QA-page.main')

@section('main-content')

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-4 gap-y-6">
                <!-- User items -->
                @foreach($users as $user)
                    <div class="bg-white p-6 rounded-lg shadow-md ">
                        <div class="h-24 w-24 mx-auto rounded-full" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.$user->image )}}'); background-size: cover"></div>
                        <div class="mt-4 text-center">
                            <p class="text-lg font-semibold">{{ $user->name }}</p>
                            <p class="text-sm text-gray-600">Software Engineer</p>
                            <button class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                                Connect
                            </button>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md ">
                        <div class="h-24 w-24 mx-auto rounded-full" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.$user->image )}}'); background-size: cover"></div>
                        <div class="mt-4 text-center">
                            <p class="text-lg font-semibold">{{ $user->name }}</p>
                            <p class="text-sm text-gray-600">Software Engineer</p>
                            <button class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                                Connect
                            </button>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md ">
                        <div class="h-24 w-24 mx-auto rounded-full" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.$user->image )}}'); background-size: cover"></div>
                        <div class="mt-4 text-center">
                            <p class="text-lg font-semibold">{{ $user->name }}</p>
                            <p class="text-sm text-gray-600">Software Engineer</p>
                            <button class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                                Connect
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
