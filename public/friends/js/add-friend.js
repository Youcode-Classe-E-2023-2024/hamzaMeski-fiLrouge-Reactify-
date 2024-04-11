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
        })
}

function render_users_cards_html(user) {
    if(user.status === "none") {
        usersContainer.innerHTML += `
        <div class="rounded-lg shadow-md flex flex-col items-center gap-2 border border-gray-300 p-4">
            <div class="h-48 w-full bg-gray-200 rounded-md" style="background-image: url('http://127.0.0.1:8000/storage/${user.image}'); background-size: cover"></div>
            <h2 class="font-semibold text-white">${user.name})</h2>
            <form receiverId="${user.id}" class="add-friend-form w-[80%]">
                <button type="submit" class="add-friend-button w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Add friend
                </button>
            </form>
            <form class="remove-friend-form w-[80%]">
                <button type="submit" class="remove-friend-button w-full bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Remove
                </button>
            </form>
        </div>`;
    }else if(user.status === "pending") {
        usersContainer.innerHTML += `
        <div class="rounded-lg shadow-md flex flex-col items-center gap-2 border border-gray-300 p-4">
            <div class="h-48 w-full bg-gray-200 rounded-md" style="background-image: url('http://127.0.0.1:8000/storage/${user.image}'); background-size: cover"></div>
            <h2 class="font-semibold text-white">${user.name})</h2>
            <div class="text-gray-400">Request sent</div>
            <form receiverId="${user.id}" class="cancel-request-form w-[80%]">
                <button type="submit" class="cancel-request-button w-full bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Cancel request
                </button>
            </form>
        </div>`;
    }
}

function addFriend() {
    const addFriendForms = document.querySelectorAll('.add-friend-form');

    for(const addFriendForm of addFriendForms) {
        addFriendForm.addEventListener('click', function(e) {
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
        cancelRequestForm.addEventListener('click', function(e) {
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
