
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let friendsRequestsContainer = document.getElementById('friends-requests-container');

keep_html_trucking();

function keep_html_trucking() {
    fetch(`/friend-requests`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(users => {
            if(!users.length) {
                friendsRequestsContainer.innerHTML = '<div class="text-gray-300 text-[14px]">Currently There is no friends requests for you.</div>';
                return;
            }
            friendsRequestsContainer.innerHTML = '';
            users.forEach(user => {
                render_users_cards_html(user);
            })

            /********************** accept friend start **************************/
            acceptFriend();
            /********************** accept friend end **************************/

            /********************** ignore friend request start **************************/
            ignoreFriend();
            /********************** ignore friend request end **************************/
        })
}


function render_users_cards_html(user) {
    friendsRequestsContainer.innerHTML += `
    <li class="flex flex-col items-end justify-between py-2 border-b border-gray-700">
        <a href="#" class="w-full flex items-center gap-4">
            <div class="h-12 w-12 rounded-full overflow-hidden">
                <img src='http://127.0.0.1:8000/storage/${user.image}' alt="Profile Picture" class="object-cover h-full w-full">
            </div>
            <div>
                <p class="font-semibold">${user.name}</p>
            </div>
        </a>
        <div class="flex">
            <form senderId="${user.id}" class="accept-request-form">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg mr-2">Accept</button>
            </form>
            <form senderId="${user.id}" class="ignore-request-form">
                <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg mr-2">Ignore</button>
            </form>
        </div>
    </li>
    `;
}

function acceptFriend() {
    const acceptRequestForms = document.querySelectorAll('.accept-request-form');

    for(const acceptRequestForm of acceptRequestForms) {
        acceptRequestForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const senderId = this.getAttribute('senderId');
            fetch(`/accept-friend/` + senderId, {
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

function ignoreFriend() {
    const ignoreRequestForms = document.querySelectorAll('.ignore-request-form');

    for(const ignoreRequestForm of ignoreRequestForms) {
        ignoreRequestForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const senderId = this.getAttribute('senderId');
            fetch(`/ignore-friend/` + senderId, {
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
