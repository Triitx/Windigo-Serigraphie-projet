import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/Login.vue'
import HomeView from '../views/HomeView.vue'
import Register from '@/views/Register.vue';
import Atelier from '@/components/Atelier.vue';
import Boutique from '@/components/Boutique.vue';
import DashboardAdmin from '@/views/DashboardAdmin.vue';
import ProductForm from '@/components/ProductForm.vue';
import ProductList from '@/components/ProductList.vue';
import { useUserStore } from '@/stores/User';
import Panier from '@/components/Panier.vue';


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/boutique',
      name: 'boutique',
      component: Boutique
    },

    {
      path: '/login',
      name: 'login',
      component: Login
    },

    {
      path: '/panier',
      name: 'panier',
      component: Panier
    },
    
    {
      path: '/ateliers',
      name: 'ateliers',
      component: Atelier
    },

    {
      path: '/register',
      name: 'register',
      component: Register
    },

    {
      path: '/:pathMatch(.*)*',
      redirect: '/'
    },

    {
      path: '/admin',
      name: 'admin.dashboard',
      component: DashboardAdmin
    },

    { 
      path: '/admin/products', 
      name: 'product-list', 
      component: ProductList 
    },
    { 
      path: '/admin/products/create', 
      name: 'product-create', 
      component: ProductForm
    },
    { 
      path: '/admin/products/:id/edit', 
      name: 'product-edit', 
      component: ProductForm 
    },
  ]
});
router.beforeEach((to, from, next) => {
  const userStore = useUserStore();
  const role = userStore.role;
  
  if (!to.meta.role) {
    return next();
  }
  else if (role == to.meta.role) {
    return next();
  }

  router.push('/login');
});

export default router
