/*
  Add custom scripts here
*/
import Echo from 'laravel-echo';
window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':3000' // Make sure the port matches your Socket.IO server
});