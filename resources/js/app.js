require('./bootstrap');


import { createApp } from 'vue';
import router from './routes';

// import User from './Helper/User';
// window.User = User



const app = createApp({})

app.use(router)

app.mount('#app')