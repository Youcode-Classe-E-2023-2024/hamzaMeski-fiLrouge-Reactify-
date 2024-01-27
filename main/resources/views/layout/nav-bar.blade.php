<div class="fixed top-0 left-0 h-20 w-full z-50 bg-white border-b backdrop-blur-lg bg-opacity-80">
    <div class="mx-auto max-w-7xl px-6 sm:px-6 lg:px-8 ">
        <div class="relative flex h-16 justify-between">
            <div class="flex flex-1 items-stretch justify-start">
                <a class="flex flex-shrink-0 items-center" href="{{ route('main') }}">
                    <ion-icon name="logo-twitter" class="text-5xl"></ion-icon>
                </a>
            </div>
            <div class="flex-shrink-0 flex px-2 py-3 items-center space-x-8">
                <a class="text-gray-700 hover:text-indigo-700 text-sm font-medium" href="{{ route('login') }}">Login</a>
                <a class="text-gray-800 bg-blue-600 hover:bg-blue-500 inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm "
                   href="{{ route('register') }}">Register
                </a>
            </div>
        </div>
    </div>
</div>

<main class="pt-20">
