//require('./bootstrap');
import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import VueRouter from 'vue-router';
import router from './routes.js';
import store from './store';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import Layout from './components/layout/Layout.vue';

window.Vue = Vue;

Vue.use(VueRouter);
Vue.use(Vuex);
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

window.axios = axios;

Vue.component('vue-layout', Layout);

const app = new Vue({
    el: '#app',

    router,
    store
});
