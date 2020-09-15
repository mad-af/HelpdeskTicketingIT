require('./bootstrap');

window.Vue = require('vue')

import vueRouter from 'vue-router'
import vueAxios from 'vue-axios'
import axios from 'axios'

[vueRouter, vueAxios, axios].forEach((x) => Vue.use(x));

import { pages } from './pages/index.js'

const routes = [
    {
        name: 'Dashboard',
        path: '/Dashboard',
        component: pages.Home
    },
    {
        name: 'Tugas.daftarTugas',
        path: '/Tugas/daftar-tugas',
        component: pages.Home
    },
    {
        name: 'Tugas.laporan',
        path: '/Tugas/laporan',
        component: pages.Home
    },
    {
        name: 'Pengaturan',
        path: '/Pengaturan',
        component: pages.Home
    },
    {
        name: 'Keluar',
        path: '/Keluar',
        component: pages.Home
    }
]

const router = new vueRouter({ mode: 'history', routes: routes });
new Vue(Vue.util.extend({ router }, pages.App)).$mount("#app");