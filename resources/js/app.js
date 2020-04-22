require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'
/*
window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
*/
import { router } from "./router/router"


import App from './components/App'


Vue.component('spinner', require('vue-simple-spinner'));



const app = new Vue({
    el: '#app',
    components: { App },
    router,
});