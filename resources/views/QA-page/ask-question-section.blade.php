@extends('shared.layout')

@section('content')
    <section class="bg-gray-900 px-4 py-6 md:px-10 lg:px-20 xl:px-40">
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
                <div class="text-red-500">
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
                <div class="text-red-500">
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
            <div class="border border-solid border-gray-700 rounded-md p-4">
                <strong class="text-white">Image (Optional)</strong>
                <label for="" class="text-gray-400">You can set an image to help fixing your issue.</label>
                <input name="image" class="block w-full text-sm text-gray-900 border border-gray-700 bg-gray-800 text-white px-3 py-2 rounded-lg mt-2" id="file_input" type="file">
            </div>
            {{-- Grid 8 --}}
            <div></div>
            {{-- Grid 9 --}}
            <div class="border border-solid border-gray-700 rounded-md p-4">
                <strong class="text-white">Description</strong>
                <textarea name="description" class="border border-gray-700 bg-gray-800 text-white px-3 py-2 w-full mt-2" rows="5"></textarea>
                <div class="text-red-500 mt-2">
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            {{-- Grid 10 --}}
            <div></div>
            {{-- Grid 11 --}}
            <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded-md">Submit</button>
        </form>
    </section>

    <script src="{{asset('QA-page/js/ask-question.js')}}"></script>

    @if(session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire("Question is created successfully!");
            })
        </script>
    @endif
