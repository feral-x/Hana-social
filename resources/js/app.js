import App from "./App.vue";
import { createApp } from 'vue';
import routing from "./router/index.js";

const app = createApp(App);
app
    .use(routing)
    .mount('#app');
