@extends('shared.layout')

@section('content')
    <div id="top-target" class="mt-20">
        {{-- Answers Section start --}}
        {{-- {{$question->id}} --}}
        <section questionId="61" id="answers-container">

        </section>

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

        {{--  update my answer  --}}
        <section id="update-answer-overlay" class="fixed hidden flex items-center justify-center w-full h-screen shadow-lg backdrop-filter backdrop-blur-md top-0 left-0">
            <div class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 z-50">
                <form id="update-answer-form"
                      class="bg-gray-800 shadow-md rounded-lg p-4 max-w-md w-full space-y-6 sm:px-10 sm:py-8 sm:space-y-8 text-lg">
                    <h1 class="text-2xl font-bold text-white text-center">update answer</h1>
                    <div>
                        <label for="answer" class="block text-sm font-medium text-gray-300">Answer</label>
                        <textarea id="update-answer-textarea" name="answer"
                                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 rounded-md py-3 px-4 h-32 bg-gray-700 text-gray-300"></textarea>
                        <div id="update-error-container" class="text-red-500 mt-2">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded mr-2">Submit</button>
                        <span id="cancel-answer-update"  class="bg-gray-600 cursor-pointer hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded ml-2">Cancel</span>
                    </div>
                </form>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('saved-questions/js/saved-questions.js') }}"></script>
    </div>
@endsection
