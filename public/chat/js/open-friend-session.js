const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
fetch('/auth-user', {
    method: 'GET',
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
})
    .then(res => res.json())
    .then(logged_user => {
        const chatContainer = document.getElementById('chat-container');
        const emptyChatContainer = document.getElementById('empty-chat-container');
        chatContainer.classList.add('hidden');
        emptyChatContainer.style.display = 'flex';

        const messagesContainer = document.getElementById('messages-container');
        const friends = document.querySelectorAll('.friends');
        const receiverImage = document .getElementById('receiver-image');
        const receiverName = document.getElementById('receiver-name');

        function updateMessagesContainer(messages, friend) {
            chatContainer.classList.remove('hidden');
            // emptyChatContainer.classList.add('hidden');
            emptyChatContainer.style.display = 'none';

            messagesContainer.innerHTML = '';
            for (let i = 0; i < messages.length; i++) {
                if (messages[i].sender_id === logged_user.id) {
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

            const image = friend.children[0].children[0].children[0].getAttribute('style');
            const name = friend.children[0].children[1].children[0].textContent;

            receiverImage.setAttribute('style', image);
            receiverName.textContent = name;
        }

        /* displaying conversations of the last clicked friend in the messagesContainer */
        if (localStorage.getItem('receiverId')) {
             friends.forEach(friend => {
                if(friend.getAttribute('receiverId') === localStorage.getItem('receiverId')) {
                    friend.classList.add('selected')
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    fetch('/get-friend-messages/' + localStorage.getItem('receiverId'), {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                        .then(res => res.json())
                        .then(data => {
                            updateMessagesContainer(data, friend);
                        });
                }
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
                        localStorage.setItem('receiverId', receiverId);
                        updateMessagesContainer(data, friendSession);
                    });
            });
        }

        /* */
    });
