import './bootstrap';


// Listen to the "chat-group" channel
window.Echo.channel("groupChat").listen('GroupMsgSent', (e) => {
    console.log('socket');
    const authId = Number(localStorage.getItem('authId'));
    const groupId = Number(localStorage.getItem('groupId'));
    console.log(e.message)
    const messagesContainer = document.getElementById('messages-container');
    if(messagesContainer) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/get-group-messages/' + groupId, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(messages => {
                const messageInfo = messages[messages.length - 1];
                if(messageInfo.sender_id == authId) {
                    messagesContainer.innerHTML += `
                    <div class="flex items-center justify-end mt-1">
                        <div class="bg-blue-500 text-white rounded-lg p-2 shadow mr-2 max-w-sm">
                            ${messageInfo.message}
                        </div>
                        <div id="receiver-image" class="w-10 h-10 rounded-full mr-2 border border-gray-300" title="${messageInfo.sender_name}" style="background-image: url('http://127.0.0.1:8000/storage/${messageInfo.sender_image}'); background-size: cover"></div>
                    </div>
                `;
                }else {
                    messagesContainer.innerHTML += `
                    <div class="flex items-center justify-start mt-1">
                        <div id="receiver-image" class="w-10 h-10 rounded-full mr-2 border border-gray-300" title="${messageInfo.sender_name}" style="background-image: url('http://127.0.0.1:8000/storage/${messageInfo.sender_image}'); background-size: cover"></div>
                        <div class="bg-gray-300 text-gray-700 rounded-lg p-2 shadow mr-2 max-w-sm">
                            ${messageInfo.message}
                        </div>
                    </div>
                `;
                }

                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            })
    }
})



// Listen to the "chat" channel
window.Echo.channel("chat").listen('MessageSent', (e) => {
    const authId = Number(localStorage.getItem('authId'));
    const receiverId = Number(localStorage.getItem('receiverId'));
    console.log(e.message)
    const messagesContainer = document.getElementById('messages-container');
    if(messagesContainer) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/get_last_inserted_message', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(res => res.json())
            .then(data => {
                const senderId = Number(data.sender_id);
                console.log(senderId, ' ', authId);
                console.log(data.receiver_id, ' ', receiverId);
                if(senderId === authId && Number(data.receiver_id) === receiverId) {
                    messagesContainer.innerHTML += `<div class="flex items-center justify-end mt-1">
                                                        <div class="bg-blue-500 text-white rounded-lg p-2 shadow mr-2 max-w-sm">
                                                            ${e.message}
                                                        </div>
                                                    </div>`;
                }if(senderId === receiverId && Number(data.receiver_id) === authId) {
                    messagesContainer.innerHTML += `<div class="flex items-center justify-start mt-1">
                                                        <div class="bg-gray-300 text-gray-700 rounded-lg p-2 shadow mr-2 max-w-sm">
                                                            ${e.message}
                                                        </div>
                                                    </div>`;
                }
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            })
    }
})
