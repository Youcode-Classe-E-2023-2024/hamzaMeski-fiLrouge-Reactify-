@extends('QA-page.main')

@section('main-content')
    <section class="grid grid-cols-4 gap-2 h-full w-full">
        <div class="col-span-1 bg-red-">
            <div class="rounded-full py-2 px-10 flex items-center justify-between" style="background: rgba(224,17,59,0.88);background: linear-gradient(90deg, rgba(0,7,36,0.82) 0%, rgba(118,9,121,1) 35%, rgba(255,72,0,1) 100%);">
                <a href="#" class="flex flex-col items-center justify-center text-blue-700">
                    <ion-icon name="person" class="text-3xl"></ion-icon>
                    <span class="text-[12px]">friends</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center">
                    <ion-icon name="people" class="text-3xl text-white"></ion-icon>
                    <span class="text-white text-[12px]">groups</span>
                </a>
            </div>
            <ul class="mt-2 flex flex-col gap-2 overflow-auto h-[80vh]">
                <li class="flex items-center justify-between">
                    <div class="flex items-center justify-between gap-2">
                        <div class="p-1 h-[52px] w-[52px] border-2 border-solid border-gray-400 rounded-full flex items-center justify-center cursor-pointer">
                            <div class="h-full w-full bg-black rounded-full" style="background-image: url('http://127.0.0.1:8000/storage/images/N42EVv3ZP7X0PHBWI1Po2oMPgc3yKokUNUatpiyO.webp'); background-size: cover"></div>
                        </div>
                        <div class="cursor-pointer">
                            <p class="font-bold">hamza meski</p>
                            <p class="text-[14px]">How are you Hamza ...</p> <!-- Changed to text-white -->
                        </div>
                    </div>
                    <div>10:13</div>
                </li>
                <li class="border-[1px] border-gray-300"></li>
            </ul>
        </div>
        <div class="col-span-3 h-full flex flex-col">
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
    </section>

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
