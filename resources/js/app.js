require('./bootstrap');

import Vue from 'vue';

import { router } from './routes';

//partials
const PostHeader = () => import('./components/PostHeader');
const NavBar = () => import('./components/NavBar');
const PostsList = () => import('./components/PostsList');
const PostsListItem = () => import('./components/PostsListItem');
Vue.component('post-header', PostHeader);
Vue.component('nav-bar', NavBar);
Vue.component('posts-list', PostsList);
Vue.component('posts-list-item', PostsListItem);

// Crear instancia de Vue
const app = new Vue({
    el: '#app',
    router,
});