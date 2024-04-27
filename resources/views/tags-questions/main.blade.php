@extends('shared.layout')

@section('content')
    <div id="tags-questions-container" class="p-4">
        <div class="h-full grid grid-cols-1 gap-x-6 gap-y-12 px-4 mt-12 sm:px-0 xl:mt-20 xl:grid-cols-3 sm:grid-cols-2 ">
            @forelse($questions as $question)
                <div class="xl:h-[250px] sm:h-[400px] rounded-2xl bg-gradient-to-br from-gray-900 to-black hover:scale-[1.05] transition duration-300 ease-in-out">
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
                <div class="col-span-3 h-full flex flex-col items-center justify-center text-gray-300 text-3xl">
                    <ion-icon class="text-yellow-500 text-5xl mb-4" name="warning-outline"></ion-icon>
                    <div class="text-center font-bold">There are no questions with that tag yet.</div>
                </div>

            @endforelse
        </div>
    </div>

    <script>
        const tagsQuestionsContainer = document.getElementById('tags-questions-container');
        tagsQuestionsContainer.classList.add(`h-[${innerHeight - 250}px]`)
        console.log(tagsQuestionsContainer)
    </script>
@endsection
