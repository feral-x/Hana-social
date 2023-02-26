import axios from "axios";
const api = axios.create();
api.interceptors.request.use(
    config => {
        if(localStorage.getItem('access_token')) {
            config.headers['Authorization'] = 'Bearer ' + localStorage.getItem('access_token');
        }
        return config;
    }
)

api.interceptors.response.use(null, (error) => {
    if (error.config && error.response && error.response.status === 401) {
        return axios.post('api/refresh', {
            'refresh_token': localStorage.getItem('refresh_token')
            }
        ).then((token) => {
            error.config.headers['Authorization'] = 'Bearer ' + token.data.access_token;
            localStorage.setItem('access_token', token.data.access_token);
            return axios.request(error.config);
        });
    }

    return Promise.reject(error);
});

export default api;
