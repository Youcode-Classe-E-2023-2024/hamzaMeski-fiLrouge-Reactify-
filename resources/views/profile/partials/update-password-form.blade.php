<section>
    <header>
        <h2 class="text-lg font-bold text-gray-300">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <input name="current_password" class="text-gray-900 w-full p-2 border bg-gray-200 border-black rounded-lg focus:outline-none focus:border-indigo-500" type="text" placeholder="current password">
            <div class="text-red-500">
                @error('current_password')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div>
            <input name="password" class="text-gray-900 w-full p-2 border bg-gray-200 border-black rounded-lg focus:outline-none focus:border-indigo-500" type="text" placeholder="new password">
            <div class="text-red-500">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div>
            <input name="password_confirmation" class="text-gray-900 w-full p-2 border bg-gray-200 border-black rounded-lg focus:outline-none focus:border-indigo-500" type="text" placeholder="confirm password">
            <div class="text-red-500">
                @error('password_confirmation')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-green-500 rounded-sm px-4 py-2 text-white">save</button>
        </div>
    </form>
</section>
