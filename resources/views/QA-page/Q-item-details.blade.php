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
                            <span class="answer_likes_content text-2xl">{{ $answer->likes }}</span>
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
            <div class="w-full max-w-lg mx-auto">
                <form id="{{ $answer->id }}" class="commentsForm bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
                            Add a comment:
                        </label>
                        {{--<input type="hidden" name="parent_id" value="2">--}}
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="comment"
                            name="comment"
                            placeholder="Write your comment here..."
                        ></textarea>
                        <div class="errorContainer text-red-500 h-[20px]">
                            {{-- errors section --}}
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit"
                        >
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>
            @foreach($answer->comments as $comment)
                <section class="relative flex items-center justify-center antialiased bg-white bg-gray-100 min-w-screen">
                    <div class="container px-0 mx-auto sm:px-5">
                        <div
                            class="flex-col w-full py-4 mx-auto bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
                            <div class="flex flex-row">
                                <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full" alt="Noob master's avatar"
                                     src="{{ 'http://127.0.0.1:8000/storage/'.$comment->user->image }}">
                                <div class="flex-col mt-1">
                                    <div class="flex items-center flex-1 px-4 font-bold leading-tight"> {{ $comment->user->name }}
                                        <span class="ml-2 text-xs font-normal text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600"> {{ $comment->comment }}
                                    </div>
                                    <div class="flex items-center gap-4 p-2">
                                        {{--replay--}}
                                        <ion-icon name="arrow-undo-outline" class="replay_comment cursor-pointer text-xl"></ion-icon>
                                        {{--like--}}
                                        <ion-icon name="heart-outline" class="like_comment cursor-pointer text-xl"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        /* like question logic */
        const handleQuestionAction = (id, action) => {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/${action}-question/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    question_likes_content.textContent = data.likes;
                });
        };

        const question_likes_content = document.querySelector('.question_likes_content');

        document.querySelectorAll('.like_question, .dislike_question').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('id');
                const action = this.classList.contains('like_question') ? 'like' : 'dislike';
                handleQuestionAction(id, action);
            });
        });


        /* like answer logic */
        const handleAnswerAction = (id, action) => {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/${action}-answer/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    // Find the closest '.answer_likes_content' element relative to the clicked button
                    const answerLikesContent = document.getElementById(id).closest('.grid').querySelector('.answer_likes_content');
                    if (answerLikesContent) {
                        answerLikesContent.textContent = data.likes;
                    }
                });
        };

        document.querySelectorAll('.like_answer, .dislike_answer').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('id');
                const action = this.classList.contains('like_answer') ? 'like' : 'dislike';
                handleAnswerAction(id, action);
            });
        });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const commentsForm = document.querySelector('.commentsForm');
        const commentTextarea = document.querySelector('.comment');
        const errorContainer = document.querySelector('.errorContainer');

        commentsForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            const answer_id = this.getAttribute('id');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/comment-on-answer/${answer_id}`, {
                method: 'POST',
                body: formData,
                headers: {
                    // 'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.errors) {
                        if (data.errors?.comment?.[0] !== undefined) {
                            console.log(data.errors.comment[0]);
                            errorContainer.textContent = data.errors.comment[0];
                        }
                    } else {
                        console.log(data.success);
                        errorContainer.textContent = '';
                    }
                })
                .catch(error => {
                    // Handle fetch errors
                    console.error('Error:', error);
                });
        });
    });
</script>
