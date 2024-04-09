// Import Laravel Echo and Pusher
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Initialize Pusher
var pusher = new Pusher('fe3fd6286e8bc2dd4e47', {
    cluster: 'eu',
    encrypted: true
});

// Initialize Echo
window.Echo = new Echo({
    broadcaster: 'pusher',
    client: pusher
});

// Subscribe to the 'chat' channel
window.Echo.channel('chat')
    .listen('.MessageSent', (e) => {
        // Handle incoming message
        console.log('New message:', e.message);
        // Update your UI to display the new message
    });

console.log('end of program');
