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
        component: pages.Dashboard,
        props: {
            Active: {
                item: 'Dashboard',
                dropdown: {
                    item: '',
                    isActive: false
                },
                isActive: true
            }
        }
    },
    {
        name: 'Tugas.daftarTugas',
        path: '/Tugas/tugas',
        component: pages.TGdaftar,
        props: {
            Active: {
                item: 'Tugas',
                dropdown: {
                    item: 'Daftar Tugas',
                    isActive: true
                },
                isActive: true
            }
        }
    },
    {
        name: 'Tugas.laporan',
        path: '/Tugas/laporan',
        component: pages.TGlaporan,
        props: {
            Active: {
                item: 'Tugas',
                dropdown: {
                    item: 'Laporan',
                    isActive: true
                },
                isActive: true
            }
        }
    },
    {
        name: 'Profil',
        path: '/Profil',
        component: pages.Profil,
        props: {
            Active: {
                item: 'Profil',
                dropdown: {
                    item: '',
                    isActive: false
                },
                isActive: true
            }
        }
    },
    {
        name: 'Keluar',
        path: '/Keluar',
        component: pages.Dashboard,
        props: {
            Active: {
                item: 'Keluar',
                dropdown: {
                    item: '',
                    isActive: false
                },
                isActive: true
            }
        }
    }
]

const router = new vueRouter({ mode: 'history', routes: routes });
new Vue(Vue.util.extend({ router }, pages.App)).$mount("#app");