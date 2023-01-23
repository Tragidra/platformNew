import router from "../../router";
export default {
    namespaced: true,
    state:{
        authenticated:false,
        user:{},
        token: localStorage.getItem('x_xsrf_token') ?? ''
    },
    getters:{
        authenticated(state){
            return state.authenticated
        },
        user(state){
            return state.user
        }
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            state.authenticated = value
        },
        SET_USER (state, value) {
            state.user = value
        },
        SET_TOKEN (state, value) {
            state.token = value
        }
    },
    actions:{
        login({commit}){
            return axios.get('/api/user').then(({data})=>{
                commit('SET_USER',data)
                commit('SET_AUTHENTICATED',true)
                // login ? '' : router.push('/');
            }).catch(({response:{data}})=>{
                commit('SET_USER',{})
                commit('SET_AUTHENTICATED',false)
            })
        },
        logout({commit}){
            commit('SET_TOKEN','')
            commit('SET_USER',{})
            commit('SET_AUTHENTICATED',false)
            router.push('/login');
        }
    }
}
