export default {
    namespaced: true,
    state:{
        users: []
    },
    getters:{
        getUserById(state, id) {
            return state.users.forEach((user) => user.id === id)
        }
    },
    mutations:{

    },
    actions:{
        async loadUsers({commit}) {
            let users = await axios.get('api/users/getAll')
        }
    }
}
