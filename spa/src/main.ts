import 'bootstrap';
// Import our custom CSS
import './assets/styles.scss';

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { useUserStore } from '@/stores/User'
import { createPinia } from 'pinia'



const pinia = createPinia()
const app = createApp(App)

app.use(router)
app.use(pinia)

app.mount('#app')

// ✅ works because the pinia instance is now active
const userStore = useUserStore()