require('./bootstrap');

window.Vue = require('vue')

import vueRouter from 'vue-router'
import vueAxios from 'vue-axios'
import axios from 'axios'
import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(vueRouter, vueAxios, axios, BootstrapVue)

import { pages } from './pages/index.js'

const routes = [
    {
        name: 'Home',
        path: '/',
        component: pages.Home
    }
]

const router = new vueRouter({ mode: 'history', routes: routes });
new Vue(Vue.util.extend({ router }, pages.App)).$mount("#app");