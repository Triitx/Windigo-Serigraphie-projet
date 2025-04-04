import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/Login.vue'
import HomeView from '../views/HomeView.vue'
import Product from '../views/Product.vue';
import Register from '@/views/Register.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/products-show/:id(\\d+)',
      name: 'products-show',
      component: Product,
      props: true
    },
    // { path: '/create', name: 'create', component: Create },
    // { path: '/edit/:id', name: 'edit', component: Edit, props: true },
    // { path: '/settings', name: 'settings', component: Settings },
    {
      path: '/login', 
      name: 'login', 
      component: Login
    },

    {
      path: '/register', 
      name: 'register', 
      component: Register
    },

    {
      path: '/:pathMatch(.*)*', 
      redirect: '/'
    }
  ]
});

export default router
