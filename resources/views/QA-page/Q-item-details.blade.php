@extends('QA-page.main')

@section('main-content')
    <section class="relative">
        <div class="md:col-span-3 h-full pt-6 px-4 md:px-20">
            {{-- Question Section start --}}
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-300">
                    {{ $question->title }}
                </h1>
                <div class="flex flex-col md:flex-row gap-4 text-gray-500 text-xs md:text-sm">
                    <span>Asked yesterday</span>
                    <span>Modified today</span>
                    <span>3 answers</span>
                </div>
            </div>

            <div class="w-full grid grid-cols-1 md:grid-cols-8 hover:scale-[1.01] transition duration-300 ease-in-out mt-6 gap-y-4 rounded-2xl bg-gradient-to-r from-gray-900 to-gray-700 backdrop-filter backdrop-blur-lg p-6" style="box-shadow: 0px 0px 2px 0px rgba(0, 128, 0, 0.75)">
                <div class="col-span-1">
                    <ul class="flex flex-col items-center gap-2 text-green-500">
                        <li>
                            <a id="{{ $question->id }}" class="like_question cursor-pointer hover:text-green-600">
                                <ion-icon name="caret-up-circle-outline" class="text-4xl"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <span class="question_likes_content text-2xl hover:text-green-600 font-bold">{{ $question->likes }}</span>
                        </li>
                        <li>
                            <a id="{{ $question->id }}" class="dislike_question cursor-pointer hover:text-green-600">
                                <ion-icon name="caret-down-circle-outline" class="text-4xl"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="" class="hover:text-green-600">
                                <ion-icon name="bookmark-outline" class="text-3xl"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-7 text-gray-300">
                    <p>
                        {{ $question->description }}
                    </p>
                </div>
                <div></div>
                <div class="col-span-7">
                    @foreach($question->tags as $tag)
                        <a href="" class="text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">{{ $tag->name }}</a>
                    @endforeach
                </div>
                <div></div>
                <div class="col-span-7 flex gap-2 text-gray-500 text-[13px]">
                    <a href="">Share</a>
                    <a href="">Follow</a>
                </div>
                <div></div>
                <div class="col-span-7 flex justify-end">
                    <div class="flex items-center justify-end gap-1">
                        <div class="h-[30px] w-[30px] rounded-md bg-black" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.$question->user->image )}}'); background-size: cover"></div>
                        <a href="" class="text-blue-500 text-[13px]">{{ $question->user->name }}</a>
                        <span class="text-[13px] text-gray-700">asked 1 min ago</span>
                    </div>
                </div>
            </div>
            {{-- Question Section end --}}

            <div id="top-target" class="mt-20">
            <span class="text-2xl text-gray-300 bg--500 rounded-sm px-8 py-1 flex items-center justify-start gap-1">
                <span class="font-bold">
                    ANSWERS SECTION/ {{ $question->answers_count }}
                </span>
                <a href="#">
                    <ion-icon name="chevron-down-circle" class="text-white"></ion-icon>
                </a>
            </span>
            </div>

            {{-- Answers Section start --}}
            <section questionId="{{$question->id}}" id="answers-container">

            </section>

            <form id="answer-question-form" class="border border-solid border-gray-700 rounded-md p-4 mt-28 flex flex-col items-center">
                <strong class="text-white">ADD YOUR ANSWER</strong>
                <textarea id="answer-textarea" name="answer" class="border border-gray-700 bg-gray-800 text-white px-3 py-2 w-full mt-2" rows="5"></textarea>

                <div id="error-container" class="text-red-500 mt-2">
                </div>

                <button type="submit" class="py-2 px-12 bg-blue-500 text-white hover:bg-blue-400 rounded-md">Submit</button>
            </form>
        </div>

        {{--  delete my answer  --}}
        <section id="delete-answer-overlay" class="fixed hidden flex items-center justify-center w-full h-screen shadow-lg backdrop-filter backdrop-blur-md top-0 left-0">
            <div class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 z-50">
                <form id="delete-answer-form" class="bg-gray-800 rounded-lg shadow-lg p-8 max-w-md">
                    <div class="text-white text-center mb-4">
                        <svg id="cancel-delete-1" xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-red-500 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.293 3.293a1 1 0 011.414 0L10 8.586l5.293-5.293a1 1 0 111.414 1.414L11.414 10l5.293 5.293a1 1 0 01-1.414 1.414L10 11.414l-5.293 5.293a1 1 0 01-1.414-1.414L8.586 10 3.293 4.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <h2 class="text-lg font-semibold">Are you sure you want to delete this answer?</h2>
                        <p class="text-sm mt-2">This action cannot be undone.</p>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded mr-2">Delete</button>
                        <span id="cancel-delete-2" class="bg-gray-600 cursor-pointer hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded ml-2">Cancel</span>
                    </div>
                </form>
            </div>
        </section>

    </section>

    {{--  comments script  --}}
    <script src="{{ asset('question-details/comments.js') }}"></script>
    <script src="{{ asset('question-details/my-answer-crud.js') }}"></script>
@endsection

