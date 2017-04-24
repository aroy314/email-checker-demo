import VueRouter from 'vue-router';

import Home from './components/Home.vue';
import About from './components/About.vue';
import Contact from './components/Contact.vue';

let routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/contact', component: Contact }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'active'
});