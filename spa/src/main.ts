import 'bootstrap';
import './assets/styles.scss';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import { createPinia } from 'pinia';
import { useUserStore } from '@/stores/User';
import { useCartStore } from './stores/Cart';
import { getCart } from './_services/CartService';

// 🔹 Vue app
const pinia = createPinia();
const app = createApp(App);
app.use(router);
app.use(pinia);

app.mount('#app');

// Recharge l'utilisateur si présent en localStorage
const userStore = useUserStore()
const cartStore = useCartStore()

// Charger le panier dès que l'utilisateur est identifié
getCart()