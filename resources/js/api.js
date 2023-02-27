import axios from "axios";
import {useStore} from "vuex";
const api = axios.create();
const store = useStore();
api.interceptors.request.use(
    config => {
        if(localStorage.getItem('access_token')) {
            config.headers['Authorization'] = 'Bearer ' + localStorage.getItem('access_token');
        }
        return config;
    }
)

api.interceptors.response.use(null, (error) => {
    if (error.config && error.response && error.response.status === 401 && localStorage.getItem('refresh_token')) {
        return axios.post('api/refresh', {
                'refresh_token': localStorage.getItem('refresh_token')
            }
        ).then((token) => {
            error.config.headers['Authorization'] = 'Bearer ' + token.data.access_token;
            localStorage.setItem('access_token', token.data.access_token);
            localStorage.setItem('refresh_token', token.data.refresh_token);
            localStorage.setItem('isLogin', '1');
            store.state.isLogin = true;
            return axios.request(error.config);
        }).catch(e => {
            localStorage.removeItem('isLogin')
            localStorage.removeItem('access_token')
            localStorage.removeItem('refresh_token')
            store.state.isLogin = false;
        })
    }

    return Promise.reject(error);
});

export default api;
