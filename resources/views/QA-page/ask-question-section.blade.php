@extends('shared.layout')

@section('content')
    <section class="bg--500 px-40 py-6">
        <form class="flex justify-between grid grid-cols-2 gap-4">
            {{--grid1--}}
            <div>
                <div class="h-full border-[1px] border-solid border-blue-300 rounded-md p-4 flex flex-col gap-4" style="background-color: rgba(13,110,253,0.47)">
                    <h1 class="text-2xl">Writing a good question</h1>
                    <p>
                        You’re ready to ask a programming-related question and this form will help guide you through the process.
                        Looking to ask a non-programming question? See the topics here to find a relevant site.
                    </p>
                    <div>
                        <strong>Steps</strong>
                        <ul class="list-disc pl-10">
                            <li class="text-[14px]">Summarize your problem in a one-line title.</li>
                            <li class="text-[14px]">Describe your problem in more detail.</li>
                            <li class="text-[14px]">Describe what you tried and what you expected to happen.</li>
                            <li class="text-[14px]">Add “tags” which help surface your question to members of the community.</li>
                            <li class="text-[14px]">Review your question and post it to the site.</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{--grid2--}}
            <img src="{{ asset('front-page/assets/images/coder.svg') }}" alt="" class="">
            {{--grid3--}}
            <div class="border border-solid border-gray-400 rounded-md flex flex-col gap-2 p-4">
                <strong>Title</strong>
                <label for="">Be specific and imagine you’re asking a question to another person</label>
                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required placeholder="What is Search Algorithm?">
            </div>
            {{--grid4--}}
            <div class="w-[80%] border border-solid border-gray-400 rounded-sm shadow-md">
                <h2 class="border-b-[1px] border-solid border-gray-400 p-4">Write a good title</h2>
                <div class="flex items-center gap-6 p-4">
                    <ion-icon name="create" class="text-4xl"></ion-icon>
                    <div class="text-[14px]">
                        <p class="mb-2">Your title should summarize the problem.</p>
                        <p>You might find that you have a better idea of your title after writing out the rest of the question.</p>
                    </div>
                </div>
            </div>
            {{--grid5--}}
            <div class="border border-solid border-gray-400 rounded-md flex flex-col gap-2 p-4">
                <strong>Tags</strong>
                <label for="">Add up to 5 tags to describe what your question is about. </label>
                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required placeholder="What is Search Algorithm?">
            </div>
            {{--grid6--}}
            <div></div>
            {{--grid7--}}
            <div class="w-full border border-solid border-gray-400 rounded-md p-4">
                <div class="">
                    <div class="w-full bg-white overflow-hidden shadow-sm">
                        <div class="w-full bg-white border-b border-gray-200">
                            <div class="mb-8">
                                <strong class="pb-4 inline-block">Description </strong></br>
                                <textarea name="content" class="border-2 border-gray-500">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
            {{--grid8--}}
            <div></div>
            {{--grid9--}}
            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded-md" required>Submit</button>
        </form>
    </section>
@endsection
