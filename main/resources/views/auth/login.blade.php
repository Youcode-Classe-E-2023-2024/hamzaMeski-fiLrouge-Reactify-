@extends('layout.layout')
@section('content')
    <div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="bg-white shadow-md rounded-md p-6">

                <img class="mx-auto h-12 w-auto" src="https://www.svgrepo.com/show/499664/user-happy.svg" alt="" />

                <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">
                    Login
                </h2>


                <form action="{{ route('login.authenticate') }}" class="space-y-6" method="post">
                    @csrf
                    <div>
                        <label for="" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input name="email" type="email" class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            <div class="text-red-500">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input name="password" type="password" class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            <div class="text-red-500">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md border border-transparent bg-sky-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">Login
                            Account
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
