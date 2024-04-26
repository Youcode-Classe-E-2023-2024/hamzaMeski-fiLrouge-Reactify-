@extends('shared.layout')

@section('content')
    <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-6 p-6">
        @forelse($savedQuestions as $question)
            <div class="w-full bg-gray-900 shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <a href="{{ route('question-details', $question->question->id) }}" class="text-xl md:text-2xl lg:text-3xl font-bold text-gray-300">
                        {{ $question->question->title }}
                    </a>
                    <div class="flex flex-col md:flex-row gap-2 md:gap-4 text-gray-500 text-xs md:text-sm mt-2">
                        <span>Asked yesterday</span>
                        <span>Modified today</span>
                        <span>3 answers</span>
                    </div>
                    <p class="text-gray-300 mt-4">
                        {{ $question->question->description }}
                    </p>
                </div>

                <div class="px-6 py-4 bg-gray-800">
                    <div class="flex justify-between items-center">
                        <div>
                            @foreach($question->question->tags as $tag)
                                <a href="{{ route('tags_questions', $tag->id) }}" class="text-xs md:text-sm text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <div class="flex gap-2 text-gray-500 text-xs md:text-sm">
                            <a href="#">Share</a>
                            <a href="#">Follow</a>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex items-center gap-1">
                            <div class="h-8 w-8 rounded-full bg-gray-800" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.$question->question->user->image )}}'); background-size: cover"></div>
                            <a href="#" class="text-blue-500 text-xs md:text-sm">{{ $question->question->user->name }}</a>
                            <span class="text-xs md:text-sm text-gray-700">asked 1 min ago</span>
                        </div>
                        <div class="flex items-center text-blue-300  gap-1">
                            <a class="like_question cursor-pointer hover:text-green-600" questionId="{{ $question->question->id }}" title="Like Question">
                                <ion-icon name="caret-up-circle-outline" class="text-lg md:text-xl"></ion-icon>
                            </a>
                            <span class="question_likes_nmb text-lg md:text-xl font-bold hover:text-green-600">{{ $question->question->likes }}</span>
                            <a class="save_question cursor-pointer" questionId="{{ $question->question->id }}" title="Save/Unsave Question">
                                <ion-icon name="bookmark-outline" class="text-lg md:text-xl"></ion-icon>
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
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const likeQstBtns = document.querySelectorAll('.like_question');
        const qstLikesNmbs = document.querySelectorAll('.question_likes_nmb');
        const saveQstBtns = document.querySelectorAll('.save_question');

        likeQstBtns.forEach(likeBtn => {
            likeBtn.addEventListener('click', function() {
                const QstId = likeBtn.getAttribute('questionId');
                fetch(`/like-question/${QstId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        const index = Array.from(likeQstBtns).indexOf(likeBtn);
                        qstLikesNmbs[index].textContent = data.likes;
                    });
            });
        });

        saveQstBtns.forEach(saveBtn => {
            saveBtn.addEventListener('click', function() {
                const QstId = saveBtn.getAttribute('questionId');
                fetch(`/save-question/${QstId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        if(data.status === 'saved') {
                            saveBtn.innerHTML = '<ion-icon name="bookmark"></ion-icon>';
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Question saved successfully",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else if(data.status === 'unsaved') {
                            saveBtn.innerHTML = '<ion-icon name="bookmark-outline"></ion-icon>';
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Question has been unsaved",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
            });
        });
    </script>
@endsection
