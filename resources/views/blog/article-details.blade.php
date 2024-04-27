@extends('shared.layout')

@section('content')
    <section class="grid grid-cols-1 md:grid-cols-3 gap-4 px-2 mt-2">
        <div class="md:col-span-2">
            <div id="articleSection" class="bg-gradient-to-br from-gray-900 to-black px-8 py-4 rounded-sm">
                <div class="flex items-center justify-between">
                    <h1 href="#" class="text-gray-300 font-semibold text-3xl">{{ $article->title }}</h1>
                    <div class="flex items-center justify-start gap-2 cursor-pointer">
                        <p blogId="{{ $article->id }}" id="like-blog-btn" class=" flex items-center justify-center text-4xl font-semibold text-green-400 bg-gray-800 border border-red-500 rounded-full shadow-lg w-12 h-12">
                            <ion-icon name="heart" id="heart" class="text-2xl text-gray-300"></ion-icon>
                        </p>
                        <span id="likes-nmb" class="likes-nmb text-gray-500 font-bold text-[12px]">
                            {{ $article->likes }}
                        </span>
                    </div>
                </div>
                <p class="text-base text-gray-400 leading-8 my-5 border-t border-gray-400">
                    {{ $article->content }}
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            <div class="bg-gradient-to-br from-gray-900 to-black p-4 grid grid-cols-6 gap-2">
                <div class="col-span-1 flex justify-between items-center text-gray-300">
                    <span class="font-bold">992</span>
                    <ion-icon name="heart"></ion-icon>
                </div>
                <a href="#" class="col-span-5 text-gray-400 text-sm underline">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, veritatis!</a>
            </div>
            <!-- Repeat similar structure for the other items -->
        </div>
    </section>


    <script>
        const articleSection = document.getElementById('articleSection');
        articleSection.classList.add(`min-h-[${innerHeight - 80}px]`);
    </script>
    <script src="{{asset('blog-details/js/like-save-blog.js')}}"></script>
@endsection
