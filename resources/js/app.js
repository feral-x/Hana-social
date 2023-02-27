import App from "./App.vue";
import { createApp } from 'vue';
import router from "./router/index.js";
import store from "./store/index.js";


const app = createApp(App);
app
    .use(store)
    .use(router)
    .mount('#app');
