const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
fetch('/user', {
    method: 'GET',
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
})
    .then(res => res.json())
    .then(logged_user_id => {
        const messagesContainer = document.getElementById('messages-container');
        const friends = document.querySelectorAll('.friends');

        function updateMessagesContainer(messages) {
            messagesContainer.innerHTML = '';
            for (let i = 0; i < messages.length; i++) {
                if (messages[i].sender_id === logged_user_id) {
                    messagesContainer.innerHTML += `<div class="flex items-center justify-end mt-1">
                                                        <div class="bg-blue-500 text-white rounded-lg p-2 shadow mr-2 max-w-sm">
                                                            ${messages[i].message}
                                                        </div>
                                                    </div>`;
                } else {
                    messagesContainer.innerHTML += `<div class="bg-white rounded-lg p-2 shadow mb-2 max-w-sm mt-1">
                                                        ${messages[i].message}
                                                    </div>`;
                }
            }
            // Scroll to the bottom after updating messagesContainer
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        /* displaying conversations of the last clicked friend in the messagesContainer */
        if (localStorage.getItem('receiverId')) {
             friends.forEach(friend => {
                if(friend.getAttribute('receiverId') === localStorage.getItem('receiverId')) {
                    friend.classList.add('selected')
                }
             });

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('/get-friend-messages/' + localStorage.getItem('receiverId'), {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    updateMessagesContainer(data);
                });
        }
        /* */

        /* displaying conversations based on the clicked friend */
        for (const friendSession of friends) {
            friendSession.addEventListener('click', function (e) {
                // Remove the 'selected' class from all friend sessions
                friends.forEach(friend => friend.classList.remove('selected'));

                // Add the 'selected' class to the clicked friend session
                this.classList.add('selected');

                const receiverId = this.getAttribute('receiverId');
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/get-friend-messages/' + receiverId, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);
                        localStorage.setItem('receiverId', receiverId);
                        updateMessagesContainer(data);
                    });
            });
        }

        /* */
    });
