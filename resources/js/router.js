import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/admin/Home';
import Dashboard from './views/admin/Dashboard';
import Categories from './views/admin/Categories';
import Articles from './views/admin/Articles';

Vue.use(Router);

const routes = [
    {
        path: '/home',
        component: Home,
        children: [
            {
                path: '',
                name: 'dashboard',
                component: Dashboard
            },
            {
                path: 'categories',
                name: 'categories',
                component: Categories
            },
            {
                path: 'articles',
                name: 'articles',
                component: Articles
            },
        ]
    },
    // {
    //     path: '/register',
    //     name: 'register',
    //     component: Register
    // },
    // {
    //     path: '/login',
    //     name: 'login',
    //     component: Login,
    // },
    // {
    //     path: '/reset-password',
    //     name: 'reset-password',
    //     component: ResetPassword
    // },
    // {
    //     path: '*',
    //     name: '404',
    //     component: Error404
    // },
]

const router = new Router({
    mode: 'history',
    routes: routes,
    linkActiveClass: 'active'
})

export default router;