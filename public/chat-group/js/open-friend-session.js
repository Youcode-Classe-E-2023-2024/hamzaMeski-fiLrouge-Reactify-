
/* groups code */
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

fetch('/auth-user', {
    method: 'GET',
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
})
    .then(res => res.json())
    .then(logged_user => {
        localStorage.setItem('authId', logged_user.id)
        const chatContainer = document.getElementById('chat-container');
        chatContainer.classList.add(`h-[${innerHeight - 50}px]`)

        const messagesContainer = document.getElementById('messages-container');
        const groups = document.querySelectorAll('.groups');
        const receiverImage = document.getElementById('receiver-image');
        const receiverName = document.getElementById('receiver-name');

        function updateMessagesContainer(messages, group) {
            console.log(messages)
            chatContainer.classList.remove('hidden');
            messagesContainer.innerHTML = '';
            for (let i = 0; i < messages.length; i++) {
                if (messages[i].sender_id === logged_user.id) {
                    messagesContainer.innerHTML += `<div class="flex items-center justify-end mt-1">
                                                        <div class="bg-blue-500 text-white rounded-lg p-2 shadow mr-2 max-w-sm">
                                                            ${messages[i].message}
                                                        </div>
                                                        <div id="receiver-image" class="w-10 h-10 rounded-full mr-2 border border-gray-300" title="${messages[i].sender_name}" style="background-image: url('http://127.0.0.1:8000/storage/${messages[i].sender_image}'); background-size: cover"></div>
                                                    </div>`;
                } else {
                    messagesContainer.innerHTML += `<div class="flex items-center justify-start mt-1">
                                                        <div id="receiver-image" class="w-10 h-10 rounded-full mr-2 border border-gray-300" title="${messages[i].sender_name}" style="background-image: url('http://127.0.0.1:8000/storage/${messages[i].sender_image}'); background-size: cover"></div>
                                                        <div class="bg-gray-300 text-gray-700 rounded-lg p-2 shadow mr-2 max-w-sm">
                                                            ${messages[i].message}
                                                        </div>
                                                    </div>`;
                }
            }
            // Scroll to the bottom after updating messagesContainer
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            const image = group.children[0].children[0].children[0].getAttribute('style');
            const name = group.children[0].children[1].children[0].textContent;

            receiverImage.setAttribute('style', image);
            receiverName.textContent = name;
        }

        /* displaying conversations of the last clicked group in the messagesContainer */
        if (localStorage.getItem('groupId')) {
            groups.forEach(group => {
                if(group.getAttribute('groupId') === localStorage.getItem('groupId')) {
                    group.classList.add('selected')
                    fetch('/get-group-messages/' + localStorage.getItem('groupId'), {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                        .then(res => res.json())
                        .then(data => {
                            updateMessagesContainer(data, group);
                        });
                }
            });
        }
        /* */

        /* displaying conversations based on the clicked group */
        for (const groupSession of groups) {
            groupSession.addEventListener('click', function (e) {
                // Remove the 'selected' class from all group sessions
                groups.forEach(group => group.classList.remove('selected'));

                // Add the 'selected' class to the clicked group session
                this.classList.add('selected');

                const groupId = this.getAttribute('groupId');
                console.log(groupId)
                fetch('/get-group-messages/' + groupId, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);
                        localStorage.setItem('groupId', groupId);
                        updateMessagesContainer(data, groupSession);
                    });

            });
        }
    });
