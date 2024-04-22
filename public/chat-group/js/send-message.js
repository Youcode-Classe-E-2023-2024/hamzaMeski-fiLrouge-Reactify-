const messageForm = document.getElementById('message-form');
const messageInput = document.getElementById('message-input');

messageForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('group_id', localStorage.getItem('groupId'));
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(`/send-group-message`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.text())
        .then(data => {
            console.log(data)
            messageInput.value = '';
        })
})
