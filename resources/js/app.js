import Vue from 'vue'
import VueRouter from 'vue-router'
import Layout from './components/Layout';
import Home from './views/Home';
import Order from './views/Order';
import Factory from './views/Factory';
import Item from './views/Item';
import User from './views/User';
import Setting from './views/Setting';

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/order',
            name: 'order',
            component: Order
        },
        {
            path: '/factory',
            name: 'factory',
            component: Factory
        },
        {
            path: '/item',
            name: 'item',
            component: Item
        },
        {
            path: '/user',
            name: 'user',
            component: User
        },
        {
            path: '/setting',
            name: 'setting',
            component: Setting
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
    render: h => h(Layout)
});
