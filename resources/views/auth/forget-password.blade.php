@extends('auth-shared.layout')

@section('content')
    <!-- component -->
    <body>
    <section class="min-h-screen flex items-stretch text-white ">
        <div class="lg:flex w-1/2 hidden bg-cover relative items-center"
             style="background-image: url(http://127.0.0.1:8000/storage/images/landingpage.jpg);">
            <div class="h-screen w-full flex items-center justify-center">
                <img src="{{ asset('front-page/assets/images/forget_password.svg') }}" alt="" class="h-[80%]">
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0 bg-red-500">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20">
                <p class="text-gray-100 uppercase">
                    You will receive an email in that address
                </p>
                <form action="{{ route('forget.password.post') }}" method="POST"
                      class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto text-gray-800">
                    @csrf
                    <div class="pb-2 pt-4">
                        <input type="email" name="email" id="email" placeholder="Email"
                               class="block w-full p-4 text-lg rounded-sm">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="px-4 pb-2 pt-4">
                        <button
                            class="uppercase block w-full p-4 text-lg rounded-full bg-green-500 hover:bg-green-400 text-white focus:outline-none">
                            reset password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </body>
@endsection
