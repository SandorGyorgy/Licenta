
require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import routes from './routes';
// ----- Imports

// Router
Vue.use(VueRouter);
const router = new VueRouter({
    routes
});
// Router

window.Vue = require('vue');

// Imported components
Vue.component('navbar-component', require('./components/LayoutComponents/NavbarComponent.vue'));
Vue.component('home-component', require('./components/HomeComponent.vue'));
Vue.component('map-component', require('./components/MapComponent.vue'));
Vue.component('footer-component', require('./components/LayoutComponents/FooterComponent.vue'));
Vue.component('register-component', require('./components/AuthComponents/RegisterComponent.vue'));
Vue.component('login-component', require('./components/AuthComponents/LoginComponent.vue'));
// Imported components

// Vue core instance
const app = new Vue({
    el: '#app',
    router
});
//Vue core instance