export default {
    namespaced: true,

    state: {
        token: null,
        user: null
    },
    actions: {
        setUser(ctx) {
            axios.get('/api/user').then((resp) => {
                ctx.commit('SET_USER', resp.data)
            })
        }
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.token = token
        },

        SET_USER(state, user) {
            console.log(user)
            state.user = user
        }
    },

    computed: {
        token: function () {
            return this.state.token
        }
    },

    getters: {
        user(state) {
            return state.user
        },
        token(state) {
            return state.token
        }
    }
}
