import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/admin/Home';
import Dashboard from './views/admin/Dashboard';
import Categories from './views/admin/Categories';
import Articles from './views/admin/Articles';
import Index from './views/client/Index';
import ClientCategories from "./views/client/ClientCategories";
import ClientArticle from "./views/client/ClientArticle";
import Register from "./views/admin/Register";
import Login from "./views/admin/Login";
import Tags from "./views/admin/Tags";
import Users from "./views/admin/Users";

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
            {
                path: 'tags',
                name: 'tags',
                component: Tags
            },
            {
                path: 'users',
                name: 'users',
                component: Users
            }
        ],
        meta: {
            secure: true
        }
    },
    {
        path: '/index',
        name: 'index',
        component: Index,
    },
    {
        path: '/categories',
        name: 'clientCategories',
        component: ClientCategories,
    },
    {
        path: '/articles/:id',
        name: 'clientArticle',
        component: ClientArticle,
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            guest: true
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            guest: true
        }
    },
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

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.secure)) {
        if (localStorage.getItem('token') == null) {
            next({
                path: '/login'
            })
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.guest)) {
        if (localStorage.getItem('token') == null) {
            next();
        } else {
            next({
                path: '/home'
            });
        }
    } else {
        next();
    }
})

export default router;