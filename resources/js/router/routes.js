window.Vue = require('vue');
const MainPage = Vue.component('main-page', require('../components/pages/MainPage.vue').default);
const Register = Vue.component('register', require('../components/pages/Register.vue').default);
const Login = Vue.component('login', require('../components/pages/Login.vue').default);

export const routes = [
    {
        path: '/',
        component: MainPage,
        name: 'MainPage',
    },
    {
        path: '/register',
        component: Register,
        name: 'Register'
    },
    {
        path: '/login',
        component: Login,
        name: 'Login'
    }
]