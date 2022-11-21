import './bootstrap';
import { createApp } from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import LoginComponent from './components/LoginComponent.vue';

const app = createApp(LoginComponent);
app.use(VueAxios, axios);
app.mount('#app');
