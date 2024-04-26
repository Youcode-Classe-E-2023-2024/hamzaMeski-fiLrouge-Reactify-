@extends('shared.layout')

@section('content')
    <div class="text-gray-300 container mx-auto p-8 overflow-hidden md:rounded-lg md:p-10 lg:p-12">
        <div class="grid gap-8 md:grid-cols-2 mt-16">
            <div class="flex flex-col justify-center">
                <p class="self-start inline font-sans text-xl font-medium text-transparent bg-clip-text bg-gradient-to-br from-green-400 to-green-600">
                    Tags list
                </p>
                <h2 class="text-4xl font-bold">Made for devs and designers</h2>
                <div class="h-6"></div>
                <p class="font-serif text-xl text-gray-400 md:pr-10">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam
                    autem, a recusandae vero praesentium qui impedit doloremque
                    molestias necessitatibus.
                </p>
                <div class="h-8"></div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-8 border-t border-gray-800">
                    <div>
                        <p class="font-semibold text-gray-400">Made with love</p>
                        <div class="h-4"></div>
                        <p class="font-serif text-gray-400">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Delectus labor.
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-400">It's easy to build</p>
                        <div class="h-4"></div>
                        <p class="font-serif text-gray-400">
                            Ipsum dolor sit, amet consectetur adipisicing elit. Delectus
                            amet consectetur.
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="-mr-24 rounded-lg md:rounded-l-full bg-gradient-to-br from-gray-900 to-black h-96"></div>
            </div>
        </div>

        <div class="text-center pt-20 pb-40">
            <a href="#tags-section">
                <ion-icon name="chevron-down-circle" class="text-4xl text-green-500 cursor-pointer md hydrated" role="img"></ion-icon>
            </a>
        </div>

        <h1 class="font-bold text-2xl text-gray-300 text-center py-12">TAGS ITEMS</h1>

        @php
            function randColor() {
                $colors = [
                'red', 'orange', 'yellow', 'green', 'blue', 'purple',
                'pink', 'cyan', 'teal', 'lime', 'indigo',
                'gray'
                ];
                $randomIndex = array_rand($colors);
                return $colors[$randomIndex];
            }

        @endphp
        <div id="tags-section" class="lg:px-12 grid gap-4 grid-cols-2 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
            @foreach($tags as $tag)
                @php $color = randColor(); @endphp
                <div class="flex items-center justify-center transform hover:scale-110 transition duration-300 ease-in-out h-[150px] w-[150px] md:h-[150px] md:w-[150px] rounded-full shadow-2xl bg-gradient-to-br from-gray-900 to-black">
                    <a href="{{ route('tags_questions', $tag->id) }}">
                        <span id="4"
                              class=" tag text-lg text-{{$color}}-600 bg-{{$color}}-300 py-1 px-3 rounded-md mr-2 cursor-pointer hover:bg-{{$color}}-400 transition-colors duration-300 ease-in-out"
                              data-tag="{{ $tag->name }}">{{ $tag->name }}
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
