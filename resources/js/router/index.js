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
        path: '/tags',
        name: "tags.page",
        component: ()=> import('../views/tags/index.vue')
    },
    {
        path: '/categories',
        name: "categories.page",
        component: ()=> import('../views/categories/index.vue')
    },
    {
        path: '/categories/:slug',
        name: "sorted.category.page",
        meta: {type: 'categories'},
        component: ()=> import('../views/sortedPage.vue')
    },
    {
        path: '/tags/:slug',
        name: "sorted.tag.page",
        meta: {type: 'tags'},
        component: ()=> import('../views/sortedPage.vue')
    },
    {
        path: '/search',
        name: "search.page",
        meta: {type: 'search'},
        component: ()=> import('../views/sortedPage.vue')
    },
    {
        path: '/register',
        name: "register.page",
        component: ()=> import('../views/Register.vue')
    },

    {name: "admin", path: '/protected/admin', component: ()=> import('../views/admin/index.vue')},


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
    if(to.name !== 'admin'){
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
    }

    //admin
    if(to.name === 'admin'){
        api.post('/api/guardian/checkout')
        .then(res => {
            if(res.status === 200){
                next();
            } else {
                router.push({name: 'main.page'})
            }
        })
        .catch(e => {
            router.push({name: 'main.page'})
        })
    }

})
export default router;
