import {createRouter, createWebHistory} from "vue-router";
import index from "../views/index.vue";

const routes = [
    {
        path: '/',
        name: "main.page",
        component: index
    },
    {
        path: '/:id',
        name: "title.page",
        component: ()=> import('../views/PagePreview/index.vue')
    },
    {
        path: '/login',
        name: "login.page",
        component: ()=> import('../views/Login.vue')
    },
    {
        path: '/register',
        name: "register.page",
        component: ()=> import('../views/Register.vue')
    }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router;
