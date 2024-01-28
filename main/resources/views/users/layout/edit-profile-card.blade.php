<!-- edit profile component -->
<form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="max-w-lg mx-auto my-10 bg-gray-900 rounded-lg shadow-md p-5">
        <div class="flex justify-between">
            <span></span>
            <a href="{{ route('profile', $user->id) }}" class="text-white underline">view</a>
        </div>
        <img class="w-32 h-32 rounded-full mx-auto border-2 border-solid " src="{{ $user->getImageURL() }}" alt="Profile picture">
        <p class="text-center text-white text-gray-600 mt-1">{{ $user->email }}</p>

        <div class="flex flex-col gap-4">
            <div>
                <label for="" class="block text-sm font-medium text-white">Name</label>
                <div class="mt-1">
                    <input value="{{ $user->name }}" name="name" type="text" class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                    <div class="text-red-500">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <label for="bio" class="block text-sm font-medium text-white">Bio</label>
                <div class="mt-1">
                    <textarea name="bio" class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">{{ $user->bio }}</textarea>
                    <div class="text-red-500">
                        @error('bio')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <label for="" class="block text-sm font-medium text-white">Profile image</label>
                <div class="mt-1">
                    <input name="image" type="file" class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                    <div class="text-red-500">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md border border-transparent bg-blue-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
                    Update profile
                </button>
            </div>
        </div>
    </div>

</form>

