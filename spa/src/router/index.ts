import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/Login.vue'
import HomeView from '../views/HomeView.vue'
import Register from '@/views/Register.vue';
import Atelier from '@/components/Atelier.vue';
import Boutique from '@/components/Boutique.vue';
import DashboardAdmin from '@/views/admin/DashboardAdmin.vue';
import ProductForm from '@/components/ProductForm.vue';
import ProductList from '@/components/ProductList.vue';
import { useUserStore } from '@/stores/User';
import Panier from '@/components/Panier.vue';
import { fetchUser } from '@/_services/AuthService';


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
      component: DashboardAdmin,
      meta: { role: 'ROLE_ADMIN' }
    }

  ]
});
router.beforeEach(async (to, from, next) => {
  const userStore = useUserStore();

  // Si fetchUser n'a pas été appelé, tu peux le forcer ici
  if (!userStore.user.email) {
    await fetchUser();
  }

  const role = userStore.user.role;

  if (!to.meta.role) {
    return next();
  }

  if (role === to.meta.role) {
    return next();
  }

  // Sinon redirige vers login
  return next('/login');
});

export default router
