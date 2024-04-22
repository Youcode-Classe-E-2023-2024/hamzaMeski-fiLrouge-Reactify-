@extends('QA-page.main')

@section('main-content')
    <link rel="stylesheet" href="{{asset('chat-group/css/open-friend-session.css')}}">
    <link rel="stylesheet" href="{{asset('chat-group/css/style.css')}}">
    <section id="chat-groups-container" class="ralative grid grid-cols-1 md:grid-cols-4 gap-2">
        <div class="col-span-1 md:col-span-1 bg-gradient-to-br from-gray-900 to-black backdrop-blur-md">
            <div class="h-[56px] py-2 px-10 flex items-center justify-between">
                <a href="{{route('chat')}}" class="flex flex-col items-center justify-center">
                    <ion-icon name="people" class="text-3xl text-white"></ion-icon>
                    <span class="text-white text-[12px]">friends</span>
                </a>
                <a href="{{route('chat_group_index')}}" class="flex flex-col items-center justify-center text-blue-700">
                    <ion-icon name="person" class="text-3xl"></ion-icon>
                    <span class="text-[12px]">groups</span>
                </a>
            </div>
            <div class="dark:text-white pr-1 flex gap-2">
                <input type="text" class="bg-gray-700 text-white placeholder-gray-400 border border-gray-600 rounded-md py-2 px-4 focus:outline-none focus:border-green-500 w-full" placeholder="Search...">
                <div class="w-[50px] flex items-center justify-center cursor-pointer border border-gray-600 hover:border-green-500 rounded-md" title="Get Only My Created Groups">
                    <ion-icon name="filter-circle" class="text-2xl font-bold text-green-500"></ion-icon>
                </div>
            </div>
            <ul id="groups-container" class=" mt-2 flex flex-col h-[70vh] overflow-auto">
                @foreach($my_created_groups as $group)
                    <li class="flex items-center gap-1 w-full">
                        <a  groupId="{{$group->id}}" class="flex-grow groups cursor-pointer  py-1 flex items-center justify-between border-b border-gray-300">
                            <div class="flex items-center justify-between gap-2">
                                <div class="p-1 h-[52px] w-[52px] border-2 border-solid border-gray-400 rounded-full flex items-center justify-center cursor-pointer">
                                    <div class="h-full w-full bg-black rounded-full" ></div>
                                </div>
                                <div class="">
                                    <p class="font-bold text-white">{{$group->name}}</p>
                                    <p class="text-[14px] text-white">My groups ...</p> <!-- Changed to text-white -->
                                </div>
                            </div>
                            <div class="text-white">10:13</div>
                        </a>
                        <ion-icon name="add-circle" groupId="{{$group->id}}" class="invite-people-button text-green-500 text-2xl cursor-pointer px-2" title="invite people to you group"></ion-icon>
                    </li>
                @endforeach
                @forelse($groups as $group)
                    <li>
                        <a  groupId="{{$group->id}}" class="groups cursor-pointer  py-1 flex items-center justify-between border-b border-gray-300">
                            <div class="flex items-center justify-between gap-2">
                                <div class="p-1 h-[52px] w-[52px] border-2 border-solid border-gray-400 rounded-full flex items-center justify-center cursor-pointer">
                                    <div class="h-full w-full bg-black rounded-full"></div>
                                </div>
                                <div class="">
                                    <p class="font-bold text-white">{{$group->name}}</p>
                                    <p class="text-[14px] text-white">How are you Hamza ...</p> <!-- Changed to text-white -->
                                </div>
                            </div>
                            <div class="text-white">10:13</div>
                        </a>
                    </li>
                @empty
                    <div class="text-white">You don't have any group yet</div>
                @endforelse
            </ul>
            <div class="flex justify-end gap-1">
                <button id="groups-requests-button" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Groups Requests
                    </span>
                </button>
                <button id="create-group-button" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Create group
                    </span>
                </button>
            </div>
        </div>
        <div id="chat-container" class="col-span-1 md:col-span-3 flex flex-col bg-gradient-to-br from-gray-900 to-black backdrop-blur-md">
            <div class="flex items-center py-2 border-b border-gray-500">
                <div id="receiver-image" class="w-10 h-10 rounded-full mr-2 border border-gray-300"></div>
                <div id="receiver-name" class="font-medium text-gray-300"></div>
            </div>

            <section id="messages-container" class="flex-1 overflow-auto px-2">
                <!-- Content goes here -->
            </section>

            <div class="px-4 py-2 border-t border-gray-500">
                <form id="message-form" class="flex items-center">
                    <input id="message-input" name="message" class="w-full border-2 rounded-full py-2 px-4 mr-2 bg-gray-200 text-gray-600 focus:outline-none focus:border-green-500" type="text" placeholder="Type your message...">
                    <button type="submit" class=" text-white font-medium h-[50px] w-[50px] rounded-full" title="send message">
                        <ion-icon name="send" class="text-4xl text-green-400"></ion-icon>
                    </button>
                </form>
            </div>
        </div>



    {{--        create group form overlay--}}
        <section id="create-form-overlay" class="hidden h-full w-full shadow-lg backdrop-filter backdrop-blur-md  absolute top-0 left-0 flex items-center justify-center">
            <div class="bg-gradient-to-b from-gray-800 to-black border border-gray-700 text-white p-2 rounded-lg shadow-md">
                <div class="flex justify-end">
                    <ion-icon id="cancel-form" name="close" class="font-bold text-2xl cursor-pointer"></ion-icon>
                </div>
                <h2 class="text-2xl font-semibold mb-4">Create New Group</h2>
                <form id="create-group-form">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium mb-1">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:border-green-500" placeholder="Enter name...">
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium mb-1">Set Image (Optional)</label>
                        <input type="file" id="image" name="image" class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium mb-1">Description (Optional)</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:border-green-500" placeholder="Enter description..."></textarea>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Create group
                            </span>
                        </button>
                    </div>

                </form>
            </div>
        </section>
    </section>


    {{--        invite people form overlay--}}
    <section id="send-group-invite-overlay" class="hidden h-full w-full shadow-lg backdrop-filter backdrop-blur-md  absolute top-0 left-0 flex items-center justify-center">

        <div class="lg:w-[400px] sm:w-screen bg-gray-900 text-white p-6 rounded-lg shadow-lg border border-gray-700">
            <div class="flex justify-end">
                <ion-icon id="cancel-invite-form" name="close" class="font-bold text-2xl cursor-pointer"></ion-icon>
            </div>
            <h2 class="text-2xl mb-4">Select Users</h2>
            <form id="send-group-invite-form">
                <!-- Search Bar -->
                <div class="mb-4 relative">
                    <input type="text" placeholder="Search users..." class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:border-indigo-500">
                    <button type="button" class="absolute top-0 right-0 mt-2 mr-3 focus:outline-none">
                        <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l5-5m0 0l-5-5m5 5H4"></path>
                        </svg>
                    </button>
                </div>

                <div class="flex flex-col gap-1 h-[300px] overflow-auto">

                    @forelse($friends as $friend)
                        <label class="flex items-center ps-4 border border-green-200 rounded dark:border-gray-700 p-2">
                            <input type="checkbox" name="checked_users[]" value="{{$friend->id}}" class="form-checkbox text-indigo-600 h-5 w-5">
                            <span class="ml-2">{{$friend->name}}</span>
                        </label>
                    @empty
                        <div class="text-gray-300">You don't have any friend yet!</div>
                    @endforelse

                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="mt-4 relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Send Invite
                            </span>
                    </button>
                </div>
            </form>
        </div>
    </section>



    {{-- groups requests overlay --}}
    <section id="groups-requests-overlay" class="hidden h-full w-full shadow-lg backdrop-filter backdrop-blur-md  absolute top-0 left-0 flex items-center justify-center">
        <div class="lg:w-[400px] sm:w-screen bg-gray-900 text-white p-6 rounded-lg shadow-lg border border-gray-700">
            <div class="flex justify-end">
                <ion-icon id="cancel-groups-request" name="close" class="font-bold text-2xl cursor-pointer"></ion-icon>
            </div>
            <h2 class="text-2xl mb-4">Groups Requests</h2>
            <div>

                <div id="groups-requests-container" class="flex flex-col gap-1 h-[300px] overflow-auto">

                </div>

            </div>
        </div>
    </section>







    {{--    scripts section --}}
    <script>
        const chatGroupsContainer = document.getElementById('chat-groups-container');
        chatGroupsContainer.classList.add(`h-[${innerHeight - 50}px]`);
    </script>

{{--          js pusher script--}}
    <script src="{{ asset('js/app.js') }}"></script>

{{--          send-message script--}}
    <script src="{{ asset('chat-group/js/send-message.js') }}"></script>

{{--          open-friend-session script--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('chat-group/js/open-friend-session.js') }}"></script>
    <script src="{{ asset('chat-group/js/create-group.js') }}"></script>
    <script src="{{ asset('chat-group/js/invite-people.js') }}"></script>
    <script src="{{ asset('chat-group/js/accept-group-requests.js') }}"></script>
{{--group section --}}
@endsection
