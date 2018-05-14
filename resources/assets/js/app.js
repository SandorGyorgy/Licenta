
require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import axiosAuth from './axios-auth';
import VueRouter from 'vue-router';
import * as VueGoogleMaps from "vue2-google-maps";
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

Vue.use(VueGoogleMaps, {
    load: {
      key: "AIzaSyDIs_aEf6tp2cSDv1B-b6fJ1SLZIHATWnk",
      libraries: "places",
      language: 'Ro'
    }
  });

window.Vue = require('vue');


// Vue core instance
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    axios,
    store,
    
});
//Vue core instance