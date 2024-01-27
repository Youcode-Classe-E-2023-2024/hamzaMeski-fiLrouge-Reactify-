<div class="flex gap-2 items-center">
    <a href="{{ route('posts.show', $post->id) }}" class="text-white font-bold">view</a>
    @if($post->user->id == auth()->id())
        <a href="{{ route('posts.edit', $post->id) }}" class="text-white font-bold">edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded-full transition duration-300 ease-in-out">
                delete
            </button>
        </form>
    @endif
</div>
