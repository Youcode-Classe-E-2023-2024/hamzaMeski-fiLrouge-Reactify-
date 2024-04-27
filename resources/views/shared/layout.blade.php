@include('shared.header')
@include('shared.nav-bar')
<div class="pt-[50px] relative">
    @auth()
    {{--        --}}
    <div id="drag" class="p-4 rounded-tl-full rounded-bl-full rounded-br-full fixed top-[80%] left-2 z-[100]" style=" background: rgb(10,107,170);
background: linear-gradient(90deg, rgba(10,107,170,1) 35%, rgba(13,152,117,1) 72%); ">
        <div id="side-bar-disappear-btn" class="hidden h-[50px] w-[50px] cursor-pointer bg-green-500 flex items-center justify-center rounded-full  py-2">
            <ion-icon name="chevron-forward" class="text-white font-bold text-xl"></ion-icon>
        </div>
    </div>

    {{--        --}}
    <ul id="side-bar-appear-cnt" class="bg-gradient-to-br from-gray-900 to-black fixed left-0 block z-[100] w-[280px] flex flex-col gap-6 overflow-hidden pt-2 border-r border-solid border-gray-600" >
        <li class="flex  justify-between px-2 pr-0">
            <div class="p-1 h-[52px] w-[52px] border-2 border-solid border-gray-400 rounded-full flex items-center justify-center">
                <div class="h-full w-full bg-black rounded-full" style="background-image: url('{{asset('http://127.0.0.1:8000/storage/'.auth()->user()->image )}}'); background-size: cover"></div>
            </div>
            <div class="">
                <p class="font-bold text-gray-200">{{ auth()->user()->name }}</p>
                <p class="text-[14px] text-white">User</p> <!-- Changed to text-white -->
            </div>

            <div id="side-bar-appear-btn" class="h-full cursor-pointer bg-green-500 w-[60px] flex items-center justify-center rounded-tl-[30px] rounded-bl-[30px]">
                <ion-icon name="chevron-back" class="text-white font-bold text-xl"></ion-icon>
            </div>

        </li>
        <li class="px-4">
            <a href="{{ route('get_tags') }}" class="flex items-center justify-between gap-1 text-gray-300">
                <span class=" text-gray-300" >Tags</span> <!-- Changed to text-white -->
                <ion-icon name="pricetags" class="text-xl"></ion-icon> <!-- Changed to text-white -->
            </a>
        </li>
        <li class="px-4">
            <a href="{{ route('saved_questions') }}" class="flex items-center justify-between gap-1 text-gray-300">
                <span class="" >Saved Questions</span> <!-- Changed to text-white -->
                <ion-icon name="help-circle" class="text-2xl"></ion-icon> <!-- Changed to text-white -->
            </a>
        </li>
        <li class="px-4">
            <a href="{{ route('saved_answers_index') }}" class="flex items-center justify-between gap-1 text-gray-300">
                <span class="" >Saved Answers</span> <!-- Changed to text-white -->
                <ion-icon name="bookmark" class="text-xl"></ion-icon> <!-- Changed to text-white -->
            </a>
        </li>
        <li class="px-4">
            <a href="{{route('friends_home')}}" class="flex items-center justify-between gap-1 text-gray-300">
                <span class="" >Friends</span> <!-- Changed to text-white -->
                <ion-icon name="person" class="text-xl"></ion-icon> <!-- Changed to text-white -->
            </a>
        </li>
        <li class="px-4">
            <a href="{{route('chat_group_index')}}" class="flex items-center justify-between gap-1 text-gray-300">
                <span class="" >Groups</span> <!-- Changed to text-white -->
                <ion-icon name="people" class="text-xl"></ion-icon> <!-- Changed to text-white -->
            </a>
        </li>
        <li class="px-4">
            <a href="{{route('chat')}}" class="side_item flex items-center justify-between gap-1 text-gray-300">
                <span class="">Discussions</span>
                <ion-icon name="chatbubbles" class="text-xl text-red-500"></ion-icon>
            </a>
        </li>
        <li class="px-4 flex items-center justify-between">
            <a href="{{route('profile.edit')}}" class="flex items-center justify-between gap-1 text-gray-300">
                <span class="">Account</span>
                <ion-icon name="settings" class="text-2xl text-blue-500"></ion-icon>
            </a>
        </li>
        <li class="px-4 text-[12px] text-gray-300">Communities for your favorite technologies.</li>
        <li class="px-4 text-[14px] text-[10px] text-green-500">Explore all collectives</li>
        <li class="px-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" title="logout" class="text-gray-900 flex items-center justify-center gap-2 bg-gray-300 p-1 rounded-md">
                    <span class="text-[10px]">logout</span>
                    <ion-icon name="log-out" class=" text-2xl"></ion-icon>
                </button>
            </form>
        </li>
    </ul>
    @endauth

    <section id="shared-yield" class="">
        @yield('content')
    </section>
</div>
<script src="{{asset('sidebar-toggle/script.js')}}"></script>

@include('shared.footer')

<script>
    // JavaScript

    // Get the element to be dragged
    var draggableElement = document.getElementById('drag');

    // Initialize variables for keeping track of mouse position
    var offsetX, offsetY;

    // Function to handle mouse down event
    function dragMouseDown(event) {
        event.preventDefault();
        // Get the initial mouse position
        offsetX = event.clientX - draggableElement.offsetLeft;
        offsetY = event.clientY - draggableElement.offsetTop;
        // Call a function whenever the cursor moves
        document.onmousemove = elementDrag;
        // Call a function when the mouse button is released
        document.onmouseup = closeDragElement;
    }

    // Function to handle the drag
    function elementDrag(event) {
        event.preventDefault();
        // Calculate the new cursor position
        var newX = event.clientX - offsetX;
        var newY = event.clientY - offsetY;
        // if newx > window.width /2      switch icon   //  dispatch icon
        // Set the element's new position
        draggableElement.style.left = newX + "px";
        draggableElement.style.top = newY + "px";
    }

    // Function to handle the mouse up event
    function closeDragElement() {
        // Stop moving when mouse button is released
        document.onmouseup = null;
        document.onmousemove = null;
    }

    // Attach the drag event listener to the draggable element
    draggableElement.onmousedown = dragMouseDown;



</script>
