
const friendsHomeContainer = document.getElementById('friends-home-container');
//
const friendsSuggestionsContainer = document.getElementById('friends-suggestions-container');
//


const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let usersContainer = document.getElementById('users-container');

keep_html_trucking();

function keep_html_trucking() {
    fetch(`/suggested-users`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(data => {
            // console.log(data)
            const users = data.users;
            usersContainer.innerHTML = '';
            users.forEach(user => {
                render_users_cards_html(user);
            })

            /********************** add friend start **************************/
            addFriend();
            /********************** add friend end **************************/

            /********************** cancel friend request start **************************/
            cancelFriendRequest();
            /********************** cancel friend request end **************************/

            /********************** remmove friend from suggestions start **************************/
            removeFriendFromSuggestions();
            /********************** remmove friend from suggestions end **************************/
        })
}

let render_users_cards_html;
if(friendsHomeContainer) {
     render_users_cards_html =  (user) =>{
        if(user.status === "none") {
            usersContainer.innerHTML += `
                <div class="rounded-lg shadow-md flex flex-col items-center gap-2 border border-gray-300 p-4">
                    <div class="h-48 w-full bg-gray-200 rounded-md" style="background-image: url('http://127.0.0.1:8000/storage/${user.image}'); background-size: cover"></div>
                    <h2 class="font-semibold text-white">${user.name}</h2>
                    <form receiverId="${user.id}" class="add-friend-form w-[80%]">
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                            Add friend
                        </button>
                    </form>
                    <form receiverId="${user.id}" class="remove-friend-form w-[80%]">
                        <button type="submit" class="w-full bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                            Remove
                        </button>
                    </form>
                </div>`;
        }else if(user.status === "pending") {
            usersContainer.innerHTML += `
                <div class="rounded-lg shadow-md flex flex-col items-center gap-2 border border-gray-300 p-4">
                    <div class="h-48 w-full bg-gray-200 rounded-md" style="background-image: url('http://127.0.0.1:8000/storage/${user.image}'); background-size: cover"></div>
                    <h2 class="font-semibold text-white">${user.name}</h2>
                    <div class="text-gray-400">Request sent</div>
                    <form receiverId="${user.id}" class="cancel-request-form w-[80%]">
                        <button type="submit" class="w-full bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                            Cancel request
                        </button>
                    </form>
                </div>`;
        }
    }
}else if(friendsSuggestionsContainer) {
    render_users_cards_html =  (user) => {
        if(user.status === "none") {
            usersContainer.innerHTML += `
                <li class="flex flex-col items-end justify-between py-2 border-b border-gray-700">
                    <a href="#" class="w-full flex items-center gap-4">
                        <div class="h-12 w-12 rounded-full overflow-hidden">
                            <img src='http://127.0.0.1:8000/storage/${user.image}' alt="Profile Picture"
                                 class="object-cover h-full w-full">
                        </div>
                        <div>
                            <p class="font-semibold">${user.name}</p>
                        </div>
                    </a>
                    <div class="flex items-center gap-2">
                        <form receiverId="${user.id}" class="add-friend-form">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                Add friend
                            </button>
                        </form>
                        <form receiverId="${user.id}" class="remove-friend-form">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                Remove
                            </button>
                        </form>
                    </div>
                </li>`;
        }else if(user.status === "pending") {
            usersContainer.innerHTML += `
                <li class="flex flex-col items-end justify-between py-2 border-b border-gray-700">
                    <a href="#" class="w-full flex items-center gap-4">
                        <div class="h-12 w-12 rounded-full overflow-hidden">
                            <img src='http://127.0.0.1:8000/storage/${user.image}' alt="Profile Picture"
                                 class="object-cover h-full w-full">
                        </div>
                        <div>
                            <p class="font-semibold">${user.name}</p>
                        </div>
                    </a>
                    <div class="flex items-center gap-2">
                        <div class="text-gray-400">Request sent</div>
                        <form receiverId="${user.id}" class="cancel-request-form">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                Cancel request
                            </button>
                        </form>
                    </div>
                </li>`;
        }
    }
}


function addFriend() {
    const addFriendForms = document.querySelectorAll('.add-friend-form');

    for(const addFriendForm of addFriendForms) {
        addFriendForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const receiverId = this.getAttribute('receiverId');
            fetch(`/add-friend/` + receiverId, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(msg => {
                   console.log(msg)
                    keep_html_trucking();
                })
        })
    }
}

function cancelFriendRequest() {
    const cancelRequestForms = document.querySelectorAll('.cancel-request-form');

    for(const cancelRequestForm of cancelRequestForms) {
        cancelRequestForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const receiverId = this.getAttribute('receiverId');
            fetch(`/cancel-friend-request/` + receiverId, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(msg => {
                    console.log(msg)
                    keep_html_trucking();
                })
        })
    }
}

function removeFriendFromSuggestions() {
    const removeFriendForms = document.querySelectorAll('.remove-friend-form');

    for(const removeFriendForm of removeFriendForms) {
        removeFriendForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const receiverId = this.getAttribute('receiverId');
            fetch(`/remove-friend/` + receiverId, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(msg => {
                    console.log(msg)
                    keep_html_trucking();
                })
        })
    }
}
