require('./bootstrap');

import Vue from 'vue';

import { router } from './routes';

//partials
const PostHeader = () => import('./components/PostHeader');
const NavBar = () => import('./components/NavBar');
const PostsList = () => import('./components/PostsList');
const PostsListItem = () => import('./components/PostsListItem');
const CategoryLink = () => import('./components/CategoryLink');
const PostLink = () => import('./components/PostLink');
const DisqusComments = () => import('./components/DisqusComments');
const PaginationLinks = () => import('./components/PaginationLinks');
const Paginator = () => import('./components/Paginator');
Vue.component('post-header', PostHeader);
Vue.component('nav-bar', NavBar);
Vue.component('posts-list', PostsList);
Vue.component('posts-list-item', PostsListItem);
Vue.component('category-link', CategoryLink);
Vue.component('post-link', PostLink);
Vue.component('comments', DisqusComments);
Vue.component('pagination-links', PaginationLinks);
Vue.component('paginator', Paginator);

// Crear instancia de Vue
const app = new Vue({
    el: '#app',
    router,
});