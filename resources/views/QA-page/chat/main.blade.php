@extends('QA-page.main')

@section('main-content')
    <div class="h-full flex flex-col">
        <div class="bg-gray-200 flex-1 overflow-y-scroll">
            <div id="messages-container" class="px-4 py-2">
                <div class="flex items-center mb-2">
                    <img class="w-8 h-8 rounded-full mr-2" src="" alt="User Avatar">
                    <div class="font-medium">John Doe</div>
                </div>
                <div class="bg-white rounded-lg p-2 shadow mb-2 max-w-sm">
                    Hi, how can I help you?
                </div>
                <div class="flex items-center justify-end">
                    <div class="bg-blue-500 text-white rounded-lg p-2 shadow mr-2 max-w-sm">
                        Sure, I can help with that.
                    </div>
                    <img class="w-8 h-8 rounded-full" src="" alt="User Avatar">
                </div>
            </div>
        </div>
        <div class="bg-gray-100 px-4 py-2">
            <form id="message-form" class="flex items-center">
                <input type="hidden" name="receiver_id" value="2">
                <input name="message" class="w-full border rounded-full py-2 px-4 mr-2" type="text" placeholder="Type your message...">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-full">
                    Send
                </button>
            </form>
        </div>
    </div>
    <script>
        const messageForm = document.getElementById('message-form');
        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/send-message`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.text())
                .then(data => console.log(data))
        })
    </script>

    {{--  js pusher script  --}}
    <script src="{{ asset('js/app.js') }}"></script>

@endsection
