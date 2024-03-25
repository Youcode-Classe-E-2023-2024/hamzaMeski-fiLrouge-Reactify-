@extends('shared.layout')

@section('content')
    <section class="bg--500 px-40 py-6">
        <form action="{{ route('ask-question.store') }}" method="POST" enctype="multipart/form-data" id="askForm" class="flex justify-between grid grid-cols-2 gap-4">
            @csrf
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
                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value=""  placeholder="What is Search Algorithm?">
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
                <div id="tagContainer" class="border-2 border-gray-300 h-[46px] flex items-center pl-2"></div>
                <div id="tags" class="">
                    @foreach($tags as $tag)
                        <span class="tag text-[13px] text-blue-600 bg-blue-200 py-1 px-2 rounded-md mr-1 cursor-pointer" data-tag="{{ $tag->name }}">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
            {{--grid6--}}
            <div></div>
            {{--grid7--}}
            <div class="border border-solid border-gray-400 rounded-md flex flex-col gap-2 p-4">
                <strong>Image (Optional)</strong>
                <label for="">You can set an image to help fixing your issue.</label>
                <input class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
            </div>
            {{--grid8--}}
            <div></div>
            {{--grid9--}}
            <div class="w-full border border-solid border-gray-400 rounded-md p-4">
                <div class="">
                    <div class="w-full bg-white overflow-hidden shadow-sm">
                        <div class="w-full bg-white border-b border-gray-200">
                            <div class="mb-8">
                                <strong class="pb-4 inline-block">Description </strong></br>
                                <textarea name="description" class="border-2 border-gray-500">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'description' );
            </script>
            {{--grid10--}}
            <div></div>
            {{--grid11--}}
            <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded-md">Submit</button>
        </form>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tagContainer = document.getElementById('tagContainer');
        const tagsContainer = document.getElementById('tags');
        const form = document.getElementById('askForm');

        // Event listener for clicking on a tag
        tagsContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('tag')) {
                const tagName = event.target.dataset.tag;
                // Move the clicked tag into the tag container div
                const newTagDiv = document.createElement('span');
                newTagDiv.classList.add('tagName', 'text-[13px]', 'text-blue-600', 'bg-blue-200', 'py-1', 'px-2', 'rounded-md', 'mr-1', 'cursor-pointer');
                newTagDiv.textContent = tagName;
                tagContainer.appendChild(newTagDiv);
                // Remove the clicked tag from the tags section
                event.target.remove();
            }
        });

        // Event listener for clicking on a tag in the tag container to move it back to tags section
        tagContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('tagName')) {
                const tagName = event.target.textContent;
                // Create a new div for the removed tag and append it back to the tags container
                const newTagDiv = document.createElement('span');
                newTagDiv.classList.add('tag', 'text-[13px]', 'text-blue-600', 'bg-blue-200', 'py-1', 'px-2', 'rounded-md', 'mr-1', 'cursor-pointer');
                newTagDiv.setAttribute('data-tag', tagName);
                newTagDiv.textContent = tagName;
                tagsContainer.appendChild(newTagDiv);
                // Remove the clicked tag from the tag container div
                event.target.remove();
            }
        });

        // Event listener for form submission
        form.addEventListener('submit', function(event) {
            // Remove any existing hidden input fields with name="values[]" before adding new ones
            form.querySelectorAll('input[name="values[]"]').forEach(function(input) {
                input.remove();
            });
            // Create hidden input fields for each tag in the tagContainer and append them to the form
            tagContainer.querySelectorAll('.tagName').forEach(function(tag) {
                const tagName = tag.textContent;
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'values[]';
                hiddenInput.value = tagName;
                form.appendChild(hiddenInput);
            });
        });
    });
</script>
