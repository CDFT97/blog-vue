require('./bootstrap');
// require('vue2-animate/dist/vue2-animate.min.css')
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
const SocialLinks = () => import('./components/SocialLinks');
const TagLink = () => import('./components/TagLink');
const ContactForm = () => import('./components/ContactForm');

Vue.component('post-header', PostHeader);
Vue.component('nav-bar', NavBar);
Vue.component('posts-list', PostsList);
Vue.component('posts-list-item', PostsListItem);
Vue.component('category-link', CategoryLink);
Vue.component('post-link', PostLink);
Vue.component('comments', DisqusComments);
Vue.component('pagination-links', PaginationLinks);
Vue.component('paginator', Paginator);
Vue.component('social-links', SocialLinks);
Vue.component('tag-link', TagLink);
Vue.component('contact-form', ContactForm);

// Crear instancia de Vue
const app = new Vue({
    el: '#app',
    router,
});