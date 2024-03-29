@extends('QA-page.main')

@section('main-content')
    <div class="col-span-3 h-full pt-6 pl-6">
        {{-- Question Section start --}}
        <div>
            <h1 class="text-2xl">
                {{ $question->title }}
            </h1>
            <div class="flex gap-4 text-gray-700 text-[13px]">
                <span>Asked yesterday</span>
                <span>Modified today</span>
                <span>3 answers</span>
            </div>
        </div>

        <div class="w-full grid grid-cols-8 border-t-[1px] border-gray-300 mt-6 gap-y-4 pt-4">
            <div class="col-span-1">
                <ul class="flex flex-col items-center gap-2">
                    <li>
                        <a id="{{ $question->id }}" class="like_question cursor-pointer">
                            <ion-icon name="caret-up-circle-outline" class="text-4xl"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <span class="question_likes_content text-2xl">{{ $question->likes }}</span>
                    </li>
                    <li>
                        <a id="{{ $question->id }}" class="dislike_question cursor-pointer">
                            <ion-icon name="caret-down-circle-outline" class="text-4xl"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <ion-icon name="bookmark-outline" class="text-3xl"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-span-7">
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
            <div class="col-span-7 flex gap-2 text-gray-700 text-[13px]">
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

        <div>
            <h1 class="text-2xl">
                {{ $question->answers_count }} {{$question->answers_count > 9 ?'Answers': 'Answer' }}
            </h1>
            <div class="flex gap-4 text-gray-700 text-[13px]">
                <span>Asked yesterday</span>
                <span>Modified today</span>
                <span>3 answers</span>
            </div>
        </div>
        {{-- Answers Section start --}}
        @foreach($answers as $answer)
            <div class="w-full grid grid-cols-8 border-t-[1px] border-gray-300 mt-6 gap-y-4 pt-4">
                <div class="col-span-1">
                    <ul class="flex flex-col items-center gap-2">
                        <li>
                            <a id="{{ $answer->id }}" class="like_answer cursor-pointer">
                                <ion-icon name="caret-up-circle-outline" class="text-4xl"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <span class="answer_likes_content text-2xl" data-answer-id="{{ $answer->id }}">{{ $answer->likes }}</span>
                        </li>
                        <li>
                            <a id="{{ $answer->id }}" class="dislike_answer cursor-pointer">
                                <ion-icon name="caret-down-circle-outline" class="text-4xl"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <ion-icon name="bookmark-outline" class="text-3xl"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-7">
                    <p>
                        {{ $answer->answer }}
                    </p>
                </div>
                <div></div>
                <div></div>
                <div class="col-span-7 flex gap-2 text-gray-700 text-[13px]">
                    <a href="">Share</a>
                    <a href="">Follow</a>
                </div>
                <div></div>
                <div class="col-span-7 flex justify-between">
                    <a href="" class="text-14 ">Add a comment</a>
                    <div class="flex items-center justify-end gap-1">
                        <div class="h-[30px] w-[30px] rounded-md bg-black" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.$answer->user->image )}}'); background-size: cover"></div>
                        <a href="" class="text-blue-500 text-[13px]">{{ $answer->user->name }}</a>
                        <span class="text-[13px] text-gray-700">asked 1 min ago</span>
                    </div>
                </div>
            </div>

            {{-- user comments section start --}}
            <div class="w-full mx-auto">
                <form id="{{ $answer->id }}" class="commentsForm shadow-md grid grid-cols-10 w-full p-2 bg-gray-300 gap-2">
                    <div class="col-span-8">
                        {{--<input type="hidden" name="parent_id" value="2">--}}
                        <input type="text"
                            class="shadow appearance-none border rounded w-full h-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="comment"
                            name="comment"
                            placeholder="Write your comment here..."
                        >
                        <div class="errorContainer text-red-500 h-[20px]">
                            {{-- errors section --}}
                        </div>
                    </div>
                    <button
                        class="col-span-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-lg"
                        type="submit"
                    >
                        Post Comment
                    </button>
                </form>
            </div>
            <div class="commentsContainer">
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
<script src="{{ asset('js/QA-page/Q-item-details/likes.js') }}"></script>

{{-- comment on a certain answer script --}}
<script src="{{ asset('js/QA-page/Q-item-details/comments.js') }}"></script>
