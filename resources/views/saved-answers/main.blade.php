@extends('shared.layout')

@section('content')
    <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-6 p-6">
        @forelse($savedAnswers as $answer)
            <div class="flex flex-col justify-between  w-full bg-gray-900 shadow-md rounded-lg overflow-hidden">
                <div class="answer text-[15px] text-gray-300 p-6">
                    {{ $answer->answer->answer }}
                </div>

                <div class="px-6 py-4 bg-gray-800">
                    <div class="flex justify-center items-center">
                        <div class="flex gap-8 items-center text-gray-500 text-xs md:text-sm">
                            <div>
                                <span answerId="{{ $answer->answer->id }}" class="answer_likes_nmb text-xl text-blue-700">

                                </span>
                                <button answerId="{{ $answer->answer->id }}" class="like_answer dark:text-gray-300 text-blue-700 border border-blue-700 hover:text-white font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center ">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z"/>
                                    </svg>
                                    <span class="sr-only">Icon description</span>
                                </button>
                            </div>
                            <a answerId="{{ $answer->answer->id }}" class="save_answer cursor-pointer" title="unsave">
                                <ion-icon name="bookmark" class="text-3xl text-gray-300"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full h-full flex items-center justify-center">
                <p class="text-gray-300 text-3xl">No saved questions found.</p>
            </div>
        @endforelse
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('saved-answers/js/saved-answers.js')}}"></script>
@endsection
