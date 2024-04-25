@extends('shared.layout')

@section('content')
    {{-- Questions Section start --}}
    {{--  home carousel container start  --}}
    <div class="p-4">


        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold leading-tight text-gray-300 sm:text-4xl lg:text-5xl">Top plateform users questions</h2>
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
