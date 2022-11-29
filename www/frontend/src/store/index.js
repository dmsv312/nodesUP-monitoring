import {createStore} from "vuex"

export default createStore({
    state: {
        token: '',
        isAuth: false,
    },
    getters: {

    },
    mutations: {
        setToken(state, token) {
            state.token = token;
        },
        setIsAuth(state, isAuth) {
            state.isAuth = isAuth
        },
    },
    actions: {

    },
    modules: {

    }
})