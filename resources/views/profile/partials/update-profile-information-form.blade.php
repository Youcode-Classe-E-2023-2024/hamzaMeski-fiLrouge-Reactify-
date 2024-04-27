<section>
    <header>
        <h2 class="text-lg font-bold text-gray-300 ">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.userInfo.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <input name="name" class="text-gray-900 w-full p-2 border bg-gray-200 border-black rounded-lg focus:outline-none focus:border-indigo-500" value="{{ auth()->user()->name }}" type="text" placeholder="name">
            <div class="text-red-500">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div>
            <input name="email" class="text-gray-900 w-full p-2 border bg-gray-200 border-black rounded-lg focus:outline-none focus:border-indigo-500" value="{{ auth()->user()->email }}" type="text" placeholder="email">
            <div class="text-red-500">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-green-500 rounded-sm px-4 py-2 text-white">save</button>
        </div>
    </form>
</section>
