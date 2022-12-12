import { createApp } from 'vue';
import ForgotPassword from '../components/ForgotPassword.vue';

const app = createApp({});
app.component('forgot-password', ForgotPassword);
app.mount('#app');