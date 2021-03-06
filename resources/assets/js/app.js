
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import routes from './routes'
import { store } from './store/index'


Vue.use(Vuetify)


Vue.use(VueRouter);

const router = new VueRouter({
    routes
});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


//*******************  Utilities

Vue.component('alert-box', require('./components/Utilities/Alert.vue'));

//********************************************

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('list-users', require('./components/ListUsers/ListUsers.vue'));
Vue.component('user-row', require('./components/ListUsers/User.vue'));
Vue.component('home-test', require('./components/HomeComponent.vue'));

Vue.component('main-nav',require('./components/Navigation/Navigation.vue'));



const app = new Vue({
    el: '#app',
    router,
    store
});
