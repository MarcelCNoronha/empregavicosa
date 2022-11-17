import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import LoginComponent from './components/LoginComponent.vue';
app.component('login-component', LoginComponent);

app.mount('#app');
