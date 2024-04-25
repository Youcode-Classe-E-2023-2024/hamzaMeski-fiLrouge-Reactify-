@extends('QA-page.main')

@section('main-content')
    {{-- Questions Section start --}}
    {{--  home carousel container start  --}}
    <div class="p-4">
{{-- hero section start --}}
        <div class="text-gray-300 container mx-auto p-8 overflow-hidden md:rounded-lg md:p-10 lg:p-12">
            <div class="flex justify-between">
                <h1 class="font-serif text-3xl font-medium">Landing</h1>
                <a href="#ask-question"
                   class="self-start px-3 py-2 leading-none text-gray-200 border border-gray-800 rounded-lg focus:outline-none focus:shadow-outline bg-gradient-to-b hover:from-indigo-500 from-gray-900 to-black">
                    Questions section
                </a>
            </div>

            <div class="h-32 md:h-40"></div>

            <p class="font-sans text-4xl font-bold text-gray-200 max-w-5xl lg:text-7xl lg:pr-24 md:text-6xl">
                Spend less time coding and more time creating
            </p>
            <div class="h-10"></div>
            <p class="max-w-2xl font-serif text-xl text-gray-400 md:text-2xl">
                Imagine being able to spent less time... This is a demonstration landing
                page made with tailwindcss
            </p>

            <div class="h-32 md:h-40"></div>

            <div class="grid gap-8 md:grid-cols-2">
                <div class="flex flex-col justify-center">
                    <p
                        class="self-start inline font-sans text-xl font-medium text-transparent bg-clip-text bg-gradient-to-br from-green-400 to-green-600">
                        Simple and easy
                    </p>
                    <h2 class="text-4xl font-bold">Made for devs and designers</h2>
                    <div class="h-6"></div>
                    <p class="font-serif text-xl text-gray-400 md:pr-10">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam
                        autem, a recusandae vero praesentium qui impedit doloremque
                        molestias necessitatibus.
                    </p>
                    <div class="h-8"></div>
                    <div class="grid grid-cols-2 gap-4 pt-8 border-t border-gray-800">
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

            <div class="h-32 md:h-40"></div>

            <p class="font-serif text-4xl">
                <span class="text-gray-400">Top 3 Articles Powered By AI</span>

                <span class="text-gray-600"
                >consectetur adipisicing elit. Consectetur atque molestiae omnis
          excepturi enim!</span>
            </p>

            <div class="h-32 md:h-40"></div>

            <div class="grid gap-4 md:grid-cols-3">
                @php $i = 0 @endphp
                @foreach($mostLikedBlogs as $blog)
                    @if($i < 4)
                    <div class="flex-col p-8 py-16 hover:scale-[1.05] transition duration-300 ease-in-out rounded-lg shadow-2xl md:p-12 bg-gradient-to-br from-gray-900 to-black">
                        <p
                            class="flex items-center justify-center text-4xl font-semibold text-green-400 bg-green-800 rounded-full shadow-lg w-14 h-14">
                            @php $i++ @endphp
                            {{ $i }}
                        </p>
                        <div class="h-6"></div>
                        <a href="{{ route('article_details', $blog->id) }}" class="font-serif text-3xl">{{ $blog->title }}</a>
                    </div>
                    @endif
                @endforeach

            </div>
        </div>
{{-- hero section end --}}
        <div id="ask-question" class="flex items-center justify-between px-6 mt-12">
            <span class="text-2xl text-gray-300">All Questions</span>
            <a href="{{ route('ask-question.show') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-md text-sm font-semibold shadow-md hover:bg-green-600 transition-colors duration-300 ease-in-out">Ask Question</a>

        </div>

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold leading-tight text-gray-300 sm:text-4xl lg:text-5xl">What platform questions their?</h2>
                <p class="max-w-lg mx-auto mt-4 text-base leading-relaxed text-gray-600">There is a bunch of questions from different types and tags you can discover</p>
            </div>

            <div class="grid grid-cols-1 gap-x-6 gap-y-12 px-4 mt-12 sm:px-0 xl:mt-20 xl:grid-cols-3 sm:grid-cols-2 ">
                @forelse($questions as $question)
                    <div class="xl:h-[250px] sm:h-[400px] rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 hover:scale-[1.05] transition duration-300 ease-in-out" style="box-shadow: 0px 0px 2px 0px rgba(255,255,255,0.75);
                    -webkit-box-shadow: 0px 0px 2px 0px rgba(255,255,255,0.75);
                    -moz-box-shadow: 0px 0px 2px 0px rgba(255,255,255,0.75);">
                        <div class="p-6 h-full flex flex-col justify-between">
                            <div class="flex items-center mb-4">
                                <img class="flex-shrink-0 object-cover w-12 h-12 rounded-full" src="{{ asset('http://127.0.0.1:8000/storage/'.$question->user->image) }}" alt="{{ $question->user->name }}" />
                                <div class="ml-4">
                                    <p class="text-base font-semibold text-white">{{ $question->user->name }}</p>
                                    <p class="text-sm text-gray-300">@user</p>
                                </div>
                            </div>
                            <div class="h-full flex flex-col justify-between items-center">
                                <a href="{{ route('question-details', $question->id) }}" class="w-full text-lg font-bold text-white mb-2">{{ substr($question->title, 0, 100) }}</a>
                                <div class="w-full">
                                    <div class="text-blue-500">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($question->tags as $tag)
                                            @php
                                                $i++;
                                            @endphp
                                            @if($i < 5)
                                                <a href="#" class="">
                                                    #{{ $tag->name }}
                                                </a>
                                            @elseif($i === 5)
                                                ...
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="w-full  flex justify-between items-center">
                                        <p class="text-sm text-gray-300">{{ $question->created_at->diffForHumans() }}</p>

                                        <div class="flex gap-2 text-sm text-gray-300">
                                            <ion-icon name="heart" class="text-red-500 text-2xl"></ion-icon>
                                            <span>{{ $question->likes }}</span>
                                        </div>
                                    </div>

                                    <div class="text-[10px] text-gray-300 font-semibold my-1">
                                        {{ $question->answers_count }} Answers
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-span-2 text-3xl text-center">There are no questions yet.</div>
                @endforelse
            </div>

        </div>



    </div>
    {{-- Questions Section end --}}
@endsection
