<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-300">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __("Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.")}}
        </p>
    </header>

    <form action="{{ route('profile.destroy') }}" method="post" class="flex items-center gap-4">
        @csrf
        @method('delete')
        <button type="submit" onclick="confirmDelete()" class="bg-red-500 rounded-sm px-4 py-2 text-white">delete</button>
    </form>
    <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
</section>
