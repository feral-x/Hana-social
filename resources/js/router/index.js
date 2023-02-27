import {createRouter, createWebHistory} from "vue-router";
import index from "../views/index.vue";
import api from "../api.js";

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

router.beforeEach((to, from, next) => {
        api.get('/api/checkout_token')
            .catch(e => {
                if(e.response.status === 401){
                    localStorage.removeItem('isLogin')
                    localStorage.removeItem('access_token')
                    localStorage.removeItem('refresh_token')
                }
            })
        next()
})
export default router;
