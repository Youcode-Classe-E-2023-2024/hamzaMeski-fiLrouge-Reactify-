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

                                        <div class="flex items-center gap-2 text-sm text-gray-300">
                                            <span class="likes-nmb">{{ $question->likes }}</span>
                                            <button questionId="{{ $question->id }}" class="like-btn text-blue-600 border border-blue-700 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center ">
                                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                                    <path d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z"/>
                                                </svg>
                                                <span class="sr-only">Icon description</span>
                                            </button>
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
    <script src="{{asset('Q-items/js/like-question.js')}}"></script>
@endsection
