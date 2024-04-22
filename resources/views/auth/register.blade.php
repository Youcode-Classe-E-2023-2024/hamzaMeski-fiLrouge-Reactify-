@extends('auth-shared.layout')

@section('content')
    <!-- component -->
    <body>
    <section class="min-h-screen flex items-stretch text-white ">
        <div class="lg:flex w-1/2 hidden bg-cover relative items-center"
             style="background-image: url(http://127.0.0.1:8000/storage/images/landingpage.jpg);">
            <div class="h-screen w-full flex items-center justify-center">
                <img src="{{ asset('front-page/assets/images/register.svg') }}" alt="" class="h-[80%]">
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0 bg-gradient-to-b from-gray-800 to-black">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center"
                 style="background-image: url(http://127.0.0.1:8000/storage/images/landingpage.jpg);">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20">

                <div class="py-6 space-x-2">
                    <a href="#"
                       class="w-10 h-10 items-center justify-center inline-flex rounded-full font-bold text-lg border-2 border-white">f</a>
                    <a href="#"
                       class="w-10 h-10 items-center justify-center inline-flex rounded-full font-bold text-lg border-2 border-white">G+</a>
                    <a href="#"
                       class="w-10 h-10 items-center justify-center inline-flex rounded-full font-bold text-lg border-2 border-white">in</a>
                </div>
                <p class="text-gray-100">
                    or use email your account
                </p>
                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto text-gray-800">
                    @csrf
                    <div class="pb-2 pt-4">
                        <input type="text" name="name" id="name" placeholder="Username"
                               class="block w-full p-4 text-lg rounded-sm ">
                        <div class="text-red-500">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="pb-2 pt-4">
                        <input type="email" name="email" id="email" placeholder="Email"
                               class="block w-full p-4 text-lg rounded-sm">
                        <div class="text-red-500">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="pb-2 bg-white rounded-sm">
                        <label for="" class="text-[12px]">upload profile pecture</label>
                        <input name="image" class="block w-full text-sm text-gray-900 pl-2 cursor-pointer focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                        <div class="text-red-500">
                            @error('image')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="pb-2 pt-4">
                        <input class="block w-full p-4 text-lg rounded-sm" type="password" name="password" id="password"
                               placeholder="Password">
                        <div class="text-red-500">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="pb-2 pt-4">
                        <input class="block w-full p-4 text-lg rounded-sm" type="password" name="password_confirmation"
                               id="password" placeholder="Confirm Password">
                        <div class="text-red-500">
                            @error('password_confirmation')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="text-right text-white hover:underline hover:text-gray-100 flex justify-between">
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                    <button id="create-group-button" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 w-full mt-4">
                        <div class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Register
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </section>
    </body>
@endsection
