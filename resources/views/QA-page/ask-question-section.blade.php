@extends('shared.layout')

@section('content')
    <section id="askQuestionSection" class="relative bg-gray-900 px-4 py-6 md:px-10 lg:px-20 xl:px-40">
        <form action="{{ route('ask-question.store') }}" method="POST" enctype="multipart/form-data" id="askForm" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            {{-- Grid 1 --}}
            <div class="border border-solid border-gray-700 rounded-md p-4">
                <h1 class="text-2xl text-green-500 font-bold mb-4">Writing a good question</h1>
                <p class="text-white">
                    You’re ready to ask a programming-related question and this form will help guide you through the process.
                    Looking to ask a non-programming question? See the topics here to find a relevant site.
                </p>
                <div class="mt-4">
                    <strong class="text-white">Steps</strong>
                    <ul class="list-disc pl-6 text-white">
                        <li class="text-sm">Summarize your problem in a one-line title.</li>
                        <li class="text-sm">Describe your problem in more detail.</li>
                        <li class="text-sm">Describe what you tried and what you expected to happen.</li>
                        <li class="text-sm">Add “tags” which help surface your question to members of the community.</li>
                        <li class="text-sm">Review your question and post it to the site.</li>
                    </ul>
                </div>
            </div>
            {{-- Grid 2 --}}
            <img src="{{ asset('front-page/assets/images/coder.svg') }}" alt="" class="hidden md:block">
            {{-- Grid 3 --}}
            <div class="border border-solid border-gray-700 rounded-md p-4">
                <strong class="text-white">Title</strong>
                <label for="" class="text-gray-400">Be specific and imagine you’re asking a question to another person</label>
                <input type="text" class="border border-gray-700 bg-gray-800 text-white px-3 py-2 w-full mt-2" name="title" id="title" value=""  placeholder="What is Search Algorithm?">
                <div id="titleError" class="text-red-500">
                    @error('title')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            {{-- Grid 4 --}}
            <div class="border border-solid border-gray-700 rounded-md p-4">
                <strong class="text-white">Write a good title</strong>
                <div class="flex items-center mt-4 text-white">
                    <ion-icon name="create" class="text-4xl"></ion-icon>
                    <div class="text-sm ml-4">
                        <p class="mb-2">Your title should summarize the problem.</p>
                        <p>You might find that you have a better idea of your title after writing out the rest of the question.</p>
                    </div>
                </div>
            </div>
            {{-- Grid 5 --}}
            <div class="border border-solid border-gray-700 rounded-md p-4">
                <strong class="text-white">Tags</strong>
                <label for="" class="text-gray-400">Add up to 5 tags to describe what your question is about. </label>
                <div id="tagContainer" class="border-[1x] border-solid border-gray-300 my-2 h-[46px] flex items-center pl-2"></div>
                <div id="tagsError" class="text-red-500">
                    @error('tags')
                    {{ $message }}
                    @enderror
                </div>
                <div id="tags" class="">
                    @foreach($tags as $tag)
                        <span id="{{ $tag->id }}" class="tag text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1 cursor-pointer" data-tag="{{ $tag->name }}">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
            {{-- Grid 6 --}}
            <div></div>
            {{-- Grid 7 --}}
            <div></div>
            {{-- Grid 8 --}}
            <div></div>
            {{-- Grid 9 --}}
            <div class="border border-solid border-gray-700 rounded-md p-4">
                <strong class="text-white">Description</strong>
                <textarea id="description" name="description" class="border border-gray-700 bg-gray-800 text-white px-3 py-2 w-full mt-2" rows="5"></textarea>
                <div id="descriptionError" class="text-red-500 mt-2">
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            {{-- Grid 10 --}}
            <div></div>
            {{-- Grid 11 --}}
            <button id="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 w-full mt-4">
                <div class="w-full relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Submit Question
                </div>
            </button>
        </form>


        <section id="overlay" class="hidden fixed h-screen w-full shadow-lg backdrop-filter backdrop-blur-md top-0 left-0 flex items-center justify-center">

            <div class="flex flex-col items-center justify-center gap-2 font-bold">
                <div class="text-gray-300">waite a few seconds...</div>
                <div class="text-gray-300 text-2xl uppercase">
                    Your Question Is Generating by AI API
                </div>
                <svg aria-hidden="true" class="w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-green-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>

        </section>


    </section>



{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function() {--}}
{{--            const navBar = document.getElementById('nav-bar');--}}
{{--            navBar.style.display = 'none';--}}
{{--            const askQuestionSection = document.getElementById('askQuestionSection');--}}
{{--            askQuestionSection.classList.add(`h-[${innerHeight}px]`);--}}
{{--            console.log(askQuestionSection);--}}
{{--        });--}}
{{--    </script>--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('QA-page/js/select-tags.js')}}"></script>
    <script src="{{asset('QA-page/js/ask-question.js')}}"></script>

    @if(session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire("Question is created successfully!");
            })
        </script>
    @endif

@endsection
