export default {
    namespaced: true,
    state:{
        users: [],
        roles: []
    },
    getters:{
        getById: state => {
            return function (id) {
                return state.users.find(user => user.id === id)
            }
        },

        getByCourseId: state => {
            return function (course_id) {
                let users = []
                state.users.forEach((user) => {
                    if (user.course_id === course_id) {
                        users.push(user)
                    }

                })

                return users
            }
        },

        getRoleById: state => {
            return function (role_id) {
                return state.roles.find(role => role.id === role_id)
            }
        },

        getAllUsers(state) {
            return state.users
        }
    },
    mutations:{
        SET_CONNECTIONS_USERS(state, value) {
            state.users = value
        },
        SET_ROLES(state, value) {
            state.roles = value
        }
    },
    actions:{
        async loadUsers({commit}) {
            let response = await axios.get('api/users/getAll')

            commit('SET_CONNECTIONS_USERS', response.data.users)
            commit('SET_ROLES', response.data.roles)
        }
    }
}
