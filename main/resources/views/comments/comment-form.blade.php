<!-- component -->
<form action="{{ route('posts.comments.store', $post->id) }}" method="post" class="mb-6">
    @csrf
    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <label for="comment" class="sr-only">Your comment</label>
        <textarea name="content" rows="6"
                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                  placeholder="Write a comment..." required></textarea>
        <div class="text-red-700">
            @error('content')
                {{ $message }}
            @enderror
        </div>
    </div>
    <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        Post comment
    </button>
</form>
