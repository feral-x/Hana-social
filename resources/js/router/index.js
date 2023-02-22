import {createRouter, createWebHistory} from "vue-router";
import index from "../views/index.vue";

const routes = [
    {
        path: '/',
        name: "main.page",
        component: index
    }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router;
