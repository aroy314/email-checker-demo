import VueRouter from 'vue-router';
import Vue from 'vue';
import Home from './components/Home.vue';
import Batch from './components/Batch.vue';
import About from './components/About.vue';
import Contact from './components/Contact.vue';
Vue.use(VueRouter);

let routes = [
	{ path: '/', component: Home },
	{ path: '/batch', component: Batch },
    { path: '/about', component: About },
    { path: '/contact', component: Contact }
];

const router = Vue.router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes
});

export default router;