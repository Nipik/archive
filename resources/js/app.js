import './bootstrap';
import axios from 'axios';

window.Echo.channel('updates')
    .listen('UpdateAvailable', (event) => {
        alert(event.message);
    });
