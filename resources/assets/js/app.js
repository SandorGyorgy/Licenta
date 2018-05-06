
require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import routes from './routes';
import App from './components/App.vue';
import Vuex from 'vuex';
import { store } from './store';
// ----- Imports

// Router
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});
// Router

window.Vue = require('vue');


// Vue core instance
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    axios,
    store
});
//Vue core instance