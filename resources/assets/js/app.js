
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import Vue from 'vue'
import VueRouter from 'vue-router';
Vue.use(VueRouter);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const routes = [
     {path:'/home',component:Home},
     {path:'/about',component:About}
 ]
 const router = new VueRouter({
     routes,
     //mode:'history'
 })
//Vue.component('example-component', require('./components/ExampleComponent.vue'));
import Myheader from './components/Myheader.vue';
import Myfooter from './components/Myfooter.vue';
import Home from './components/Home.vue';
import About from './components/About.vue';
import Add from './components/Add.vue';
import Show from './components/Show.vue';
import Update from './components/Update.vue';
//Vue.component('Myheader',Myheader);
const app = new Vue({
    el: '#app',
    router,
    components:{
        Myheader,
        Myfooter,
        Home,
        About,
        Add,
        Show,
        Update
    }
});
