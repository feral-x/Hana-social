import { createStore } from 'vuex'

// Create a new store instance.
const store = createStore({
    state () {
        return {
            isLogin: localStorage.getItem('isLogin')
        }
    },
    mutations: {
        getLoginStatus(){
            return this.state.isLogin
        },
        setLoginStatus(){
            return this.state.isLogin
        },
        logout(){
            localStorage.removeItem('isLogin')
            localStorage.removeItem('access_token')
            localStorage.removeItem('refresh_token')
            this.state.isLogin = false;
        }
    }
})

export default store;
