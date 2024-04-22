@extends('shared.layout')

@section('content')

    <div class="flex flex-wrap bg-gray-900">
        <div class="w-full sm:w-8/12 mb-10">
            <div class="container mx-auto h-full sm:p-10">
                <nav class="flex px-4 justify-between items-center">
                    <div>
                        <img src="https://image.flaticon.com/icons/svg/497/497348.svg" alt="" class="w-8">
                    </div>
                </nav>
                <header class="container px-4 lg:flex mt-10 items-center h-full lg:mt-0">
                    <div class="w-full">
                        <h1 class="text-4xl lg:text-6xl font-bold text-gray-300">Discover <span class="text-green-700">AI</span> articles Based on users questions.</h1>
                        <div class="w-20 h-2 bg-green-700 my-4"></div>
                        <p class="text-xl mb-10 text-gray-200">This section is powered by an AI API that handle articles using a detection algorithm, Beside highlighting the most likes articles as the ranked once.</p>
                        <button class="bg-green-500 text-white text-2xl font-medium px-4 py-2 rounded shadow">Learn More</button>
                    </div>
                </header>
            </div>
        </div>
        <img src="{{asset('images/ai.jpeg')}}" alt="Leafs" class="w-full h-48 object-cover sm:h-screen sm:w-4/12">
    </div>

    <section class="lg:py-20 lg:px-16 sm:py-8 sm:px-8">
        <div class="grid gap-4 md:grid-cols-3 gap-y-12 sm:p-4 lg:px-2 lg:pt-12 ">
            @forelse($articles as $article)
                <div class="hover:text-green-500 flex-col p-8 py-16 hover:scale-[1.05] transition duration-300 ease-in-out rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
                    <div class="flex items-center justify-start gap-2">
                        <p class="flex items-center justify-center text-4xl font-semibold text-green-400 bg-gray-800 border border-red-500 rounded-full shadow-lg w-12 h-12">
                            <ion-icon name="heart" class="text-2xl text-gray-300"></ion-icon>
                        </p>
                        <span class="text-gray-500 font-bold text-[12px]">
                            43
                        </span>
                    </div>
                    <div class="h-6"></div>
                    <a href="{{ route('article_details', $article->id) }}" class="font-serif text-3xl text-gray-300">{{ $article->title }}</a>
                </div>
            @empty
                <div class="text-center text-gray-300">There is no article yet</div>
            @endforelse
        </div>
    </section>

@endsection
