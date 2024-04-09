const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
fetch('/user', {
    method: 'GET',
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
})
    .then(res => res.json())
    .then(id => {
        const logged_user_id = id
        const messagesContainer = document.getElementById('messages-container');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        const friends = document.querySelectorAll('.friends');



        /* displaying conversations of the last clicked friend in the messagesContainer */
        if(localStorage.getItem('receiverId')) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('/get-friend-messages/' + localStorage.getItem('receiverId'), {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    messagesContainer.innerHTML = '';
                    for(let i = 0; i < data.length; i++) {
                        if(data[i].sender_id === logged_user_id) {
                            messagesContainer.innerHTML += `<div class="flex items-center justify-end mt-1">
                                                                <div class="bg-blue-500 text-white rounded-lg p-2 shadow mr-2 max-w-sm">
                                                                    ${data[i].message}
                                                                </div>
                                                            </div>`;
                        }else {
                            messagesContainer.innerHTML += `<div class="bg-white rounded-lg p-2 shadow mb-2 max-w-sm mt-1">
                                                                ${data[i].message}
                                                            </div>`;
                        }
                    }
                })
        }
        /* */



        /* displaying conversations based on the clicked friend */
        for(const friendSession of friends) {
            friendSession.addEventListener('click', function(e) {
                const receiverId = this.getAttribute('receiverId')

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/get-friend-messages/' + receiverId, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data)
                        localStorage.setItem('receiverId', receiverId);
                        messagesContainer.innerHTML = '';
                        for(let i = 0; i < data.length; i++) {
                            if(data[i].sender_id === logged_user_id) {
                                messagesContainer.innerHTML += `<div class="flex items-center justify-end mt-1">
                                                                    <div class="bg-blue-500 text-white rounded-lg p-2 shadow mr-2 max-w-sm">
                                                                        ${data[i].message}
                                                                    </div>
                                                                </div>`;
                            }else {
                                messagesContainer.innerHTML += `<div class="bg-white rounded-lg p-2 shadow mb-2 max-w-sm mt-1">
                                                                    ${data[i].message}
                                                                </div>`;
                            }
                        }
                    })
            })
        }
        /* */
    })

