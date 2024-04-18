@extends('shared.layout')

@section('content')

    <div class="flex flex-wrap bg-gray-900">
        <div class="w-full sm:w-8/12 mb-10">
            <div class="container mx-auto h-full sm:p-10">
                <nav class="flex px-4 justify-between items-center">
                    <div class="text-4xl font-bold">
                        Blog<span class="text-green-700">.</span>
                    </div>
                    <div>
                        <img src="https://image.flaticon.com/icons/svg/497/497348.svg" alt="" class="w-8">
                    </div>
                </nav>
                <header class="container px-4 lg:flex mt-10 items-center h-full lg:mt-0">
                    <div class="w-full">
                        <h1 class="text-4xl lg:text-6xl font-bold text-white">Discover <span class="text-green-700">AI</span> articles Based on users questions.</h1>
                        <div class="w-20 h-2 bg-green-700 my-4"></div>
                        <p class="text-xl mb-10 text-gray-200">This section is powered by an AI API that handle articles using a detection algorithm, Beside highlighting the most likes articles as the ranked once.</p>
                        <button class="bg-green-500 text-white text-2xl font-medium px-4 py-2 rounded shadow">Learn More</button>
                    </div>
                </header>
            </div>
        </div>
        <img src="{{asset('images/ai.jpeg')}}" alt="Leafs" class="w-full h-48 object-cover sm:h-screen sm:w-4/12">
    </div>

<!-- Featured section -->
<section class="py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-white mb-8">Top articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($articles as $article)
            <div class=" bg-gray-900 rounded-lg overflow-hidden hover:scale-[1.05] transition duration-300 ease-in-out" style="box-shadow: 0px 0px 2px 0px rgba(255,255,255,0.75);
-webkit-box-shadow: 0px 0px 2px 0px rgba(255,255,255,0.75);
-moz-box-shadow: 0px 0px 2px 0px rgba(255,255,255,0.75);">
                <img src="{{ 'https://source.unsplash.com/600x600/?' . $article->title }}" alt="Coffee"
                     class="w-full h-64 object-cover">
                <div class="p-6  h-full">
                    <h3 class="text-xl font-bold text-white mb-2">{{ $article->title }}</h3>
                    <p class="text-base text-gray-400">{{ strlen($article->content) >= 200 ? substr($article->content, 0, 200) . '...' : substr($article->content, 0, 200) }}.</p>
                    <div class="mb-0 flex items-center justify-between">
                        <span class="text-white font-medium">{{ $article->created_at->diffForHumans() }}</span>
                        <a href="{{ route('article_details', $article->id) }}"
                            class="px-4 py-2 bg-green-600 text-white font-bold rounded-full hover:bg-green-700 transition duration-200">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
                @empty
                <div class="text-gray-300">There is no article yet!</div>
            @endforelse
        </div>
    </div>
</section>




@endsection
