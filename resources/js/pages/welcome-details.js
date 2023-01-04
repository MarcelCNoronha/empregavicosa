import { createApp } from 'vue';
import WelcomeDetails from '../components/WelcomeDetails.vue';

const app = createApp({});
app.component('welcome-details', WelcomeDetails);
app.mount('#app');