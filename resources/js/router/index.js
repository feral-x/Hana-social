import {createRouter, createWebHistory} from "vue-router";
import index from "../views/index.vue";
import api from "../api.js";
import store from "../store/index.js";

const routes = [
    {
        path: '/',
        name: "main.page",
        component: index
    },
    {
        path: '/g/:id',
        name: "title.page",
        component: ()=> import('../views/PagePreview/index.vue')
    },
    {
        path: '/g/:book_id/:page_id',
        name: "read.page",
        component: ()=> import('../views/ReadPage.vue')
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
    },



    {
        path: '/:pathMatch(.*)*',
        name: '404',
        component: ()=>import('../views/404.vue')
    },
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

router.beforeEach((to, from, next) => {
        api.get('/api/checkout_token')
            .catch(e => {
                if(e.response.status === 401){
                    localStorage.removeItem('isLogin')
                    localStorage.removeItem('access_token')
                    localStorage.removeItem('refresh_token')
                    store.state.isLogin = false;
                }
            })
        next()
})
export default router;
