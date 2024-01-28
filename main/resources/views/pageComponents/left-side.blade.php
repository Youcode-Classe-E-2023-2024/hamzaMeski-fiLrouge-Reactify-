<div class="w-2/5 text-white h-12 pl-32 h-auto">
    <!--left menu-->
    <nav class="mt-5 px-2">
        <a href="{{ route('main') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full bg-blue-800 text-blue-300">
            <ion-icon name="home-outline" class="text-3xl mr-4"></ion-icon>
            Home
        </a>
        @auth
            <a href="#" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-blue-800 hover:text-blue-300">
                <ion-icon name="eye-outline" class="text-3xl mr-4"></ion-icon>
                Feed
            </a>

        @endauth

    </nav>

</div>
