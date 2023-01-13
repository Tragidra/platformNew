import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from "./views/index";
import Profile from "./views/profile/Profile";
import Login from "./views/auth/Login";
import Courses from "./views/courses/Courses";
import Homeworks from "./views/homeworks/Homeworks";

const routes = [
    {
        path: '/',
        component: Index
    },
    {
        path: '/profile',
        component: Profile
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/courses',
        component: Courses
    },
    {
        path: '/homeworks',
        component: Homeworks
    },
];

const router = new vueRouter({
    mode: "history",
    routes: routes
});

router.beforeEach(( to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')
    if(!token){
        if(to.path === '/login'){
            return next()
        }
        else {
            return next('/login')
        }
    }

    if(to.path === '/login' && token){
        return next('/')
    }
    next()
})

export default router
