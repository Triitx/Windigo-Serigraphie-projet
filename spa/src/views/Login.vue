<script setup lang="ts">
import { ref, onMounted } from 'vue';
import router from '@/router';
import * as AuthService from '@/_services/AuthService';
import FormError from '@/components/FormError.vue';

const auth = ref({
  email: '',
  password: ''
});

const errors = ref<any>({});

onMounted(async () => {
  console.log('exec on mounted');
});

async function login() {
  try {
    await AuthService.login(auth.value);
      console.log('Connexion réussie !');
      router.push('/');
  } catch(error: any) {
    console.log(error)
    errors.value = error.response.data.errors;
  }
}
</script>

<template>
  <div class="top-container">
    <form @submit.prevent="login">
      <h2 class="form-title">Connexion</h2>
      <div class="form-group">
        <input type="text" class="input" v-model="auth.email" placeholder="Email" />
        <FormError :errors="errors.email"/>
      </div>
      <div class="form-group">
        <input type="password" class="input" v-model="auth.password" placeholder="Mot de passe" />
        <FormError :errors="errors.password"/>
      </div>
      <div class="form-group">
        <button type="submit" class="button">Connexion</button>
      </div>
    </form>
  </div>
</template>