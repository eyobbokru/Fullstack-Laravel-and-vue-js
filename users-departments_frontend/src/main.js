import { createApp } from 'vue'
import App from './App.vue'
import router from './router'


import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import './assets/main.css'

import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/';

const app = createApp(App)


app.use(router)


app.mount('#wrapper')
