const sendGroupInviteOverlay = document.getElementById('send-group-invite-overlay');
const invitePeopleButtons = document.querySelectorAll('.invite-people-button');
const sendGroupInviteForm = document.getElementById('send-group-invite-form');
const cancelInviteForm = document.getElementById('cancel-invite-form');
let groupId;
cancelInviteForm.addEventListener('click', function() {
    sendGroupInviteOverlay.classList.add('hidden');
})

for(const invitePeopleButton of invitePeopleButtons) {
    invitePeopleButton.addEventListener('click', function() {
        sendGroupInviteOverlay.classList.remove('hidden');
        groupId = this.getAttribute('groupId');
    })
}

sendGroupInviteForm.addEventListener('submit', function(event ) {
    event.preventDefault();
    console.log(groupId);

    const formData = new FormData(this);
    console.log(formData);
    fetch('/invite-people/' + groupId , {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.text())
        .then(data => {
            console.log(data);
        })
})
