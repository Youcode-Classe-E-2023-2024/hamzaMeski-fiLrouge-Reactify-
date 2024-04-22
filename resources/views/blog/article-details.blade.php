@extends('shared.layout')

@section('content')
    <section class="grid grid-cols-1 md:grid-cols-3 gap-4 px-2 mt-2">
        <div class="md:col-span-2">
            <div class="bg-gradient-to-br from-gray-900 to-black px-8 py-4 rounded-sm">
                <h1 href="#" class="text-gray-300 font-bold text-4xl">Portrait Photography In Early Days</h1>
                <p class="text-base text-gray-400 leading-8 my-5 border-t border-gray-400">
                    {{ $article->content }}
                </p>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#Election</a>
                    <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#people</a>
                    <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#Election2020sub-heading</a>
                    <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#trump</a>
                    <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">#Joe</a>
                </div>
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

@endsection
