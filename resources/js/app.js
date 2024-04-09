import './bootstrap';

window.Echo.channel("chat").listen('MessageSent', (e) => {
    console.log(e.message)
    const messagesContainer = document.getElementById('messages-container');
    if(messagesContainer) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/user', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(logged_user_id => {
                fetch('/get_last_inserted_message', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        if(data.sender_id === logged_user_id)
                            messagesContainer.innerHTML += `<div class="flex items-center justify-end mt-1">
                                                                <div class="bg-blue-500 text-white rounded-lg p-2 shadow mr-2 max-w-sm">
                                                                    ${e.message}
                                                                </div>
                                                            </div>`;
                        if(data.sender_id !== logged_user_id) {
                            messagesContainer.innerHTML += `<div class="bg-white rounded-lg p-2 shadow mb-2 max-w-sm mt-1">
                                                                ${e.message}
                                                            </div>`;
                        }
                    })
            })
    }
})
