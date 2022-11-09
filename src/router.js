import HomePage from './components/HomePage.vue'
import Signup from './components/SignUp.vue'
import LoginPage from './components/LoginPage.vue'
import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        name: 'HomePage',
        component: HomePage,
        path: '/'
    },

    {
        name: 'Signup',
        component: Signup,
        path: '/signup'
    },

    {
        name: 'LoginPage',
        component: LoginPage,
        path: '/login'
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
