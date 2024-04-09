const messageForm = document.getElementById('message-form');
messageForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('receiver_id', localStorage.getItem('receiverId'));
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(`/send-message`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(res => res.text())
        .then(data => console.log(data))
})
