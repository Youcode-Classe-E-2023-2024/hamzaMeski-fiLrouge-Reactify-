@extends('auth-shared.layout')

@section('content')
    <!-- component -->
    <body>
    <section class="min-h-screen flex items-stretch text-white ">
        <div class="lg:flex w-1/2 hidden bg-cover relative items-center" style="background-image: url(http://127.0.0.1:8000/storage/images/landingpage.jpg);">
            <div class="h-screen w-full flex items-center justify-center">
                <img src="{{ asset('front-page/assets/images/forget_password.svg') }}" alt="" class="h-[80%]">
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0 bg-red-500">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20">

                <div class="py-6 space-x-2">
                    <a href="#" class="w-10 h-10 items-center justify-center inline-flex rounded-full font-bold text-lg border-2 border-white">f</a>
                    <a href="#" class="w-10 h-10 items-center justify-center inline-flex rounded-full font-bold text-lg border-2 border-white">G+</a>
                    <a href="#" class="w-10 h-10 items-center justify-center inline-flex rounded-full font-bold text-lg border-2 border-white">in</a>
                </div>
                <p class="text-gray-100">
                    or use email your account
                </p>
                <form action="{{ route('reset.password.post') }}" method="POST" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto text-gray-800">
                    @csrf
                    <input name="token" type="text" hidden value="{{ $token }}">
                    <div class="pb-2 pt-4">
                        <input type="email" name="email" id="email" placeholder="Email" class="block w-full p-4 text-lg rounded-sm">
                        <div class="text-red-500">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="pb-2 pt-4">
                        <input class="block w-full p-4 text-lg rounded-sm" type="password" name="password" id="password" placeholder="Password">
                        <div class="text-red-500">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="pb-2 pt-4">
                        <input class="block w-full p-4 text-lg rounded-sm" type="password" name="password_confirmation" id="password" placeholder="Confirm Password">
                        <div class="text-red-500">
                            @error('password_confirmation')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="px-4 pb-2 pt-4">
                        <button type="submit" class="uppercase block w-full p-4 text-lg rounded-full bg-green-500 hover:bg-green-400 focus:outline-none">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </body>
@endsection
