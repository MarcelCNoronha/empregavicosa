import { createApp } from 'vue';
import Login from '../components/Login.vue';
import VueMask from '@devindex/vue-mask';

const app = createApp({});
app.component('login', Login);
app.use(VueMask);
app.mount('#app');
