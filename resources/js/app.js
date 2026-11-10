
window.Vue = require('vue').default;
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import { store } from '../js/store/store';

import VueEvents from 'vue-events'
Vue.use(VueEvents);

import axios from 'axios'
import Vueaxios from 'vue-axios';
Vue.use(Vueaxios, axios);

import moment from 'moment';
window.moment = moment;

Vue.filter('formatDateTime', function(date){
    if(!date) return '';
    return moment(date).format('L hh:mm');
});

import VueNoty from 'vuejs-noty'
import 'vuejs-noty/dist/vuejs-noty.css'
Vue.use(VueNoty, {
    timeout: 1000,
    progressBar: false,
    layout: 'topCenter',
    theme: 'sunset',
    animation: {
        open : 'animated fadeInRight',
        close: 'animated fadeOutRight'
    }
    // closeWith: ['click', 'button'],
});

import Form from 'vform';
window.Form = Form;

Vue.component('header-component', require('./components/layout/HeaderComponent.vue').default);
Vue.component('sidebar-component', require('./components/layout/SidebarComponent.vue').default);
Vue.component('footer-component', require('./components/layout/FooterComponent.vue').default);

import { routes } from './routes';

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

router.beforeEach((to, from, next) => {
    next();
})

const app = new Vue(Vue.util.extend({ router, store })).$mount('#app');