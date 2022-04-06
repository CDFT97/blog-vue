import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Import de componentes vistas y creación de sus variables
const Home = () => import('./views/Home');
const About = () => import('./views/About');
const Archive = () => import('./views/Archive');
const Contact = () => import('./views/Contact');
const PostsShow = () => import('./views/PostsShow');
const CategoryPosts = () => import('./views/CategoryPosts');
const TagPosts = () => import('./views/TagPosts');

const NotFound = () => import('./views/NotFound.vue');
export const router = new VueRouter({
    linkExactActiveClass: 'active',
    // mode: 'history',
    routes: [
        {
            name: 'home',
            path: '/',
            component: Home
            
        },
        {
            name: 'about',
            path: '/about',
            component: About
        },
        {
            name: 'archive',
            path: '/archive',
            component: Archive
        },
        {
            name: 'contact',
            path: '/contact',
            component: Contact
        },
        {
            name: 'posts_show',
            path: '/blog/:url',
            component: PostsShow
        },
        {
            name: 'category_posts',
            path: '/categories/:category',
            component: CategoryPosts
        },
        {
            name: 'tags_posts',
            path: '/tags/:tag',
            component: TagPosts
        },
        {
            path:'*',
            component: NotFound
        }
    ],
    scrollBehavior(){
        return {x:0, y:0};
    }

});