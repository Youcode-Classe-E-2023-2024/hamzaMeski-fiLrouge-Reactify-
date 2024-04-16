@extends('shared.layout')

@section('content')
    <div class="h-[91vh] bg-gradient-to-b from-gray-800 to-black text-white rounded-[30px] flex flex-col gap-4 items-center justify-center shadow-lg p-8">
        <h1 class="text-5xl font-bold border-b-2 border-solid border-gray-300 px-4 py-2">
            TOP USERS
        </h1>
        <p class="text-xl uppercase">This section highlights our top contributing users on the platform.</p>
        <p class="text-lg">Connect with these proficient individuals to gain valuable insights!</p>
        <a href="#top-users-container" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
            Explore Top Users
        </a>
    </div>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>


    <div id="top-users-container" class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-4 gap-y-6">
                <!-- User items -->
                @foreach($users as $user)
                    <div class="bg-white p-6 rounded-lg border-2 border-red-400 hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="h-24 w-24 mx-auto rounded-full overflow-hidden">
                            <img src="{{ asset('http://127.0.0.1:8000/storage/'.$user->image) }}" alt="{{ $user->name }}" class="object-cover h-full w-full" >
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-lg font-semibold">{{ $user->name }}</p>
                            <p class="text-sm text-gray-600">{{ $user->occupation }}</p>
                            <button class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">
                                Connect
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
