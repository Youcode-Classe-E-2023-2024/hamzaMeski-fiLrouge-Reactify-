const groupsRequestsOverlay = document.getElementById('groups-requests-overlay');
const groupsRequestsButton = document.getElementById('groups-requests-button');
const cancelGroupsRequest = document.getElementById('cancel-groups-request');
const groupsRequestsContainer = document.getElementById('groups-requests-container');

groupsRequestsButton.addEventListener('click', function() {
    groupsRequestsOverlay.classList.remove('hidden');
})

cancelGroupsRequest.addEventListener('click', function() {
    groupsRequestsOverlay.classList.add('hidden');
})

handleGroupRequest();
function handleGroupRequest() {
    fetch('/groups-requests', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.json())
        .then(groups => {
            groupsRequestsContainer.innerHTML = '';
            renderRequestsHTML(groups);

            refuseGroupRequest();
            acceptGroupRequest();
        })
}

function renderRequestsHTML(groups) {
    if(groups.length === 0) {
        groupsRequestsContainer.innerHTML = '<div class="text-gray-300">You don`t have any group request yet! <span class="text-green-500">: )</span></div>';
        return;
    }
    groups.forEach(group => {
        groupsRequestsContainer.innerHTML += `
        <div class="flex gap-1 items-center border border-green-200 rounded dark:border-gray-700 p-2">
            <button groupId="${group.id}" class="refuse-group-btn relative inline-flex items-center justify-center p-0.5 overflow-hidden text-xs font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-400 to-red-600 group-hover:from-red-400 group-hover:to-red-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-red-200 dark:focus:ring-red-800">
                <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Refuse
                </span>
            </button>

           <button groupId="${group.id}" class="accept-group-btn relative inline-flex items-center justify-center p-0.5 overflow-hidden text-xs font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Accept
                </span>
           </button>
            <span class="ml-2">${group.name}</span>
        </div>
        `;
    })
}

function refuseGroupRequest() {
    const refuseGrouptBtns = document.querySelectorAll('.refuse-group-btn');
    for(const refuseGrouptBtn of refuseGrouptBtns) {
        refuseGrouptBtn.addEventListener('click', function() {
            const groupId = this.getAttribute('groupId');
            fetch('/refuse-group-request/' + groupId, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: `Group refused successfully`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    handleGroupRequest();
                })
        })
    }
}

function acceptGroupRequest() {
    const acceptGroupBtns = document.querySelectorAll('.accept-group-btn');
    for(const acceptGroupBtn of acceptGroupBtns) {
        acceptGroupBtn.addEventListener('click', function() {
            const groupId = this.getAttribute('groupId');
            fetch('/accept-group-request/' + groupId, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: `You are now a Part of that group`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    handleGroupRequest();
                })
        })
    }
}
