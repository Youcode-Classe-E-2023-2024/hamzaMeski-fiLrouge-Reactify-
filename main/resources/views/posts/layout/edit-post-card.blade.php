<div class="flex items-center flex-shrink-0 p-4 pb-0 justify-between">
    <a href="{{ route('profile', $post->user->id) }}" class="flex-shrink-0 group block">
        <div class="flex items-center">
            <div>
                <img class="inline-block h-10 w-10 rounded-full" src="{{ $post->user->getImageURL() }}" alt=""/>
            </div>
            <div class="ml-3">
                <p class="text-base leading-6 font-medium text-white">
                    {{ $post->user->name}}
                    <span class="text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                        {{ $post->user->email}}. {{ $post->created_at->diffForHumans()}}
                    </span>
                </p>
            </div>
        </div>
    </a>
    @include('posts.layout.post-crud')
</div>



<div class="pl-16">
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('put')
        <p class="text-base width-auto font-medium text-white flex-shrink">
        <textarea name="content" id="comment" rows="6"
                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                  placeholder="Write a comment..." required>{{ $post->content }}</textarea>
        </p>
        <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Update post
        </button>
    </form>


    <div class="flex">
        <div class="flex items-center">
            <div class="flex-1 text-center py-2 m-2">
                <a href="#"
                   class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                    <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </a>
            </div>
            <div class="flex-1 text-center">
                <a href="#"
                   class="w-12 mt-1 group flex items-center text-gray-500 px-3 py-2 text-base leading-6 font-medium rounded-full hover:bg-blue-800 hover:text-blue-300">
                    <svg class="text-center h-6 w-6" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

</div>
<hr class="border-gray-600">
