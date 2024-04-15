
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
            if(!users) {
                allFriendsContainer.innerHTML = '<div class="text-gray-300 text-[14px]">Currently you have no friend yet.</div>';
                return;
            }
            allFriendsContainer.innerHTML = '';
            users.forEach(user => {
                render_users_cards_html(user);
            })

            /********************** display options **************************/
            displayOptions();

            /********************** accept friend start **************************/
            blockFriend();

            /********************** remove friend start **************************/
            deleteFriend();

            /********************** see friend profile **************************/
            seeFriendProfile();
        })
}


function render_users_cards_html(user) {
    allFriendsContainer.innerHTML += `
        <li class="relative flex items-center gap-14 justify-between py-2 border-b border-gray-700 pr-2">
            <a href="#" userId="${user.id}" class="see-profile w-full flex items-center gap-4">
                <div class="h-12 w-12 rounded-full overflow-hidden">
                    <img src='http://127.0.0.1:8000/storage/${user.image}' alt="Profile Picture" class="object-cover h-full w-full">
                </div>
                <div>
                    <p class="font-semibold">${user.name}</p>
                </div>
            </a>
            <ion-icon name="ellipsis-horizontal" class="options-btns cursor-pointer text-2xl text-white"></ion-icon>

            <div class="options hidden absolute border border-gray-500 w-[200px] h-[100px] selected text-white rounded-lg top-[70%] right-[0%] z-[200] p-2 shadow-md">
                <div class="h-full border border-gray-500 rounded-lg flex flex-col justify-between p-2 font-bold text-[14px]">
                    <form userId="${user.id}" class="block-friend-form">
                        <div class="flex items-center gap-1">
                            <ion-icon name="ban"></ion-icon>
                            <button>block friend</button>
                        </div>
                    </form>
                     <form userId="${user.id}" class="delete-friend-form">
                        <div class="flex items-center gap-1">
                            <ion-icon name="person-remove"></ion-icon>
                            <button>Unfollow friend</button>
                        </div>
                    </form>
                </div>
            </div>
        </li>
        `;
}

function blockFriend() {
    const blockFriendForms = document.querySelectorAll('.block-friend-form');

    for(const blockFriendForm of blockFriendForms) {
        blockFriendForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('userId');
            fetch(`/block-friend/` + userId, {
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

function deleteFriend() {
    const deleteFriendForms = document.querySelectorAll('.delete-friend-form');

    for(const deleteFriendForm of deleteFriendForms) {
        deleteFriendForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('userId');
            fetch(`/delete-friend/` + userId, {
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

function displayOptions() {
    const optionsBtns = document.querySelectorAll('.options-btns');
    for(const btn of optionsBtns) {
        btn.addEventListener('click', function(event) {

            optionsBtns.forEach(btn => {
                const optionsList= btn.parentElement.querySelector('.options');
                optionsList.classList.add('hidden');
            })

            const optionsList = btn.parentElement.querySelector('.options');
            optionsList.classList.remove('hidden');

            event.stopPropagation();
            document.addEventListener('click', function(event) {
                if(!optionsList.contains(event.target) && !(optionsList === event.target)) {
                    optionsList.classList.add('hidden');
                }
            })
        })
    }
}

function seeFriendProfile() {
    const userProfileContainer = document.getElementById('user-profile-container');
    const seeProfiles = document.querySelectorAll('.see-profile');
    for(const seeProfile of seeProfiles) {
        seeProfile.addEventListener('click', function() {
            console.log(this.getAttribute('userId'))
            userProfileContainer.innerHTML = `
            `;
        })
    }
}
