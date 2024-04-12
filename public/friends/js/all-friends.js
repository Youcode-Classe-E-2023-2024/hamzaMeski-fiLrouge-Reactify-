
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let allFriendsContainer = document.getElementById('all-friends-container');

keep_html_trucking();

function keep_html_trucking() {
    fetch(`/all-friends`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(users => {
            console.log(users)
            if(!users) {
                allFriendsContainer.innerHTML = '<div class="text-gray-300 text-[14px]">Currently you have no friend yet.</div>';
                return;
            }
            allFriendsContainer.innerHTML = '';
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
    allFriendsContainer.innerHTML += `
    <li class="flex items-center gap-14 justify-between py-2 border-b border-gray-700 pr-2">
        <a href="#" class="w-full flex items-center gap-4">
            <div class="h-12 w-12 rounded-full overflow-hidden">
                <img src='http://127.0.0.1:8000/storage/${user.image}' alt="Profile Picture" class="object-cover h-full w-full">
            </div>
            <div>
                <p class="font-semibold">${user.name}</p>
            </div>
        </a>
        <ion-icon name="ellipsis-horizontal" class="cursor-pointer text-2xl text-white"></ion-icon>
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
