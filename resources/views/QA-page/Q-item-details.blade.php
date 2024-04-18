@extends('QA-page.main')

@section('main-content')
    <div class="col-span-3 h-full pt-6 px-20 ">
        {{-- Question Section start --}}
        <div>
            <h1 class="text-2xl font-bold text-gray-300">
                {{ $question->title }}
            </h1>
            <div class="flex gap-4 text-gray-500 text-[13px]">
                <span>Asked yesterday</span>
                <span>Modified today</span>
                <span>3 answers</span>
            </div>
        </div>

        <div class="w-full grid grid-cols-8 hover:scale-[1.01] transition duration-300 ease-in-out  mt-6 gap-y-4 rounded-2xl bg-gradient-to-r from-gray-900 to-gray-700 backdrop-filter backdrop-blur-lg p-6" style="box-shadow: 0px 0px 2px 0px rgba(0, 128, 0, 1.75)">
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

        <div class="mt-20">
            <span class="text-2xl text-gray-900 bg--500 rounded-sm px-8 py-1 flex items-center justify-start gap-1">
                <span class="font-bold">
                    ANSWERS SECTION/ {{ $question->answers_count }}
                </span>
                <a href="#">
                    <ion-icon name="chevron-down-circle" class="text-white"></ion-icon>
                </a>
            </span>

        </div>









        {{-- Answers Section start --}}
        @foreach($answers as $answer)
            <div class="mt-10 hover:scale-[1.01] transition duration-300 ease-in-out rounded-xl p-6 bg-gradient-to-r from-gray-900 to-gray-700 backdrop-filter backdrop-blur-lg">
                <div class="flex gap-4 text-gray-700 text-[13px]">
                    <span>Asked yesterday</span>
                    <span>Modified today</span>
                    <span>3 answers</span>
                </div>
                <div class="w-full grid grid-cols-8 border-1 border-solid border-gray-300   gap-y-4 pt-4 ">
                    <div class="col-span-1">
                        <ul class="flex flex-col items-center gap-2  text-gray-300">
                            <li>
                                <a id="{{ $answer->id }}" class="like_answer cursor-pointer hover:text-gray-200">
                                    <ion-icon name="caret-up-circle-outline" class="text-4xl"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <span class="answer_likes_content text-2xl hover:text-gray-200" data-answer-id="{{ $answer->id }}">{{ $answer->likes }}</span>
                            </li>
                            <li>
                                <a id="{{ $answer->id }}" class="dislike_answer cursor-pointer hover:text-gray-200">
                                    <ion-icon name="caret-down-circle-outline" class="text-4xl"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <ion-icon name="bookmark" class="text-3xl"></ion-icon>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-span-7 text-gray-200">
                        <p class="">
                            {!!   $answer->answer !!}
                        </p>
                    </div>
                    <div></div>
                    <div></div>
                    <div class="col-span-7 flex gap-2 text-gray-700 text-[13px]">
                        <a href="">Share</a>
                    </div>
                    <div></div>

                </div>
            </div>
            {{-- user comments section end --}}
        @endforeach
        {{-- Answers Section start --}}
        {{-- Add your answer Section start --}}
        <form method="POST" action="{{ route('answer-question.store', $question->id) }}">
            @csrf
            <div class="w-full border border-solid border-gray-400 rounded-md p-4 mt-20">
                <div class="">
                    <div class="w-full bg-white overflow-hidden shadow-sm">
                        <div class="w-full bg-white border-b border-gray-200">
                            <div class="mb-8">
                                <strong class="pb-4 inline-block">Add your answer </strong></br>
                                <textarea name="answer" class="border-2 border-gray-500"></textarea>
                            </div>
                            <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded-md">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'answer' );
            </script>
        </form>
        {{-- Add your answer Section end --}}
    </div>
@endsection

{{-- like question answers logic --}}
<script src="{{ asset('Q-item-details/likes.js') }}"></script>

{{-- comment on a certain answer script --}}
<script src="{{ asset('Q-item-details/comments.js') }}"></script>
