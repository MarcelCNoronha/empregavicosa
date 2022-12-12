import { createApp } from 'vue';
import ResetPassword from '../components/ResetPassword.vue';

const app = createApp({});
app.component('reset-password', ResetPassword);
app.mount('#app');