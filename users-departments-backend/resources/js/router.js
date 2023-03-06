import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Home.vue';
import App from './App.vue';
import Departments from './components/Departments.vue';
import UserList from './components/UserList.vue';
import NotFound from './components/NotFound.vue';

const routes = [
    {
        path: '/home',
        name: 'home',
        component: Home,
    },
    {
        path: '/',
        name: 'app',
        component: App,
    },
    {
        path: '/departments',
        name: 'departments',
        component: Departments,
    },
    {
        path: '/users',
        name: 'users',
        component: UserList,
    },
    {
        path: '/:catchAll(.*)',
        name: 'notFound',
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
