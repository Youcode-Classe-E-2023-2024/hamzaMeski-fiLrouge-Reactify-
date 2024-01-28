<!-- component -->
<div class="max-w-lg mx-auto my-10 bg-gray-900 rounded-lg shadow-md p-5">
    <img class="w-32 h-32 rounded-full mx-auto border-2 border-solid " src="{{ $user->getImageURL() }}" alt="Profile picture">
    <h2 class="text-center text-white text-2xl font-semibold mt-3">{{ $user->name }}</h2>
    <p class="text-center text-white text-gray-600 mt-1">{{ $user->email }}</p>
    <div class="mt-5">
        <h3 class="text-xl text-white font-semibold">Bio</h3>
        <p class="text-gray-600 mt-2 text-white">{{ $user->bio }}</p>
    </div>
</div>
