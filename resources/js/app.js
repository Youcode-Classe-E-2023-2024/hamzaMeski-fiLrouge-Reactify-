import './bootstrap';

window.Echo.channel("chat").listen('MessageSent', (e) => {
    console.log(e.message)
    const messagesContainer = document.getElementById('messages-container');
    if(messagesContainer) {
        console.log(messagesContainer)
    }
})
