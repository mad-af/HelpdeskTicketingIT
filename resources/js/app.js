require('./bootstrap');

window.Vue = require('vue')

import vueRouter from 'vue-router'
import vueAxios from 'vue-axios'
import axios from 'axios'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'

[vueRouter, vueAxios, axios, VueMaterial].forEach((x) => Vue.use(x));

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