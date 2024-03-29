/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Laravel Echo and Pusher
 */
import Echo from "laravel-echo";
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to easily build robust real-time web applications.
 */

// Additional configurations if you're using environment variables for Pusher
// Uncomment the following lines if you're using Vite for your environment variables
// import.meta.env.VITE_PUSHER_APP_KEY,
// import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
// import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
// import.meta.env.VITE_PUSHER_PORT ?? 80,
// import.meta.env.VITE_PUSHER_PORT ?? 443,
// import.meta.env.VITE_PUSHER_SCHEME ?? 'https',

// Uncomment the following lines if you're using process.env for your environment variables
// process.env.PUSHER_APP_KEY,
// process.env.PUSHER_APP_CLUSTER ?? 'mt1',
// process.env.PUSHER_HOST ? process.env.PUSHER_HOST : `ws-${process.env.PUSHER_APP_CLUSTER}.pusher.com`,
// process.env.PUSHER_PORT ?? 80,
// process.env.PUSHER_PORT ?? 443,
// process.env.PUSHER_SCHEME ?? 'https',
