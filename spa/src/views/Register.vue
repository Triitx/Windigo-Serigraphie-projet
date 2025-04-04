<script setup lang="ts">
import { ref, onMounted } from 'vue';
import router from '@/router';
import * as AuthService from '@/_services/AuthService';

const form = ref({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
});

const errors = ref<any>({});

onMounted(async () => {
  console.log('exec on mounted');
});

async function handleRegister() {
  try {
    await AuthService.register(form.value);
    alert('Un mail de vérification vous a été envoyé.');
    router.push('/login');
  } catch (e: any) {
    errors.value = e.response?.data?.errors || {};
  }
}
</script>

<template>
  <div class="top-container">
    <form @submit.prevent="handleRegister">
      <div class="register">
        <h2 class="form-title">Inscription</h2>
        <div class="container-champ">
          <div class="form-group">
            <input v-model="form.name" type="text" class="input" placeholder="Nom" />
          </div>
          <!-- <div class="form-group">
            <input v-model="form.first-name" type="text" class="input" placeholder="Prénom" />
          </div> -->
          <div class="form-group">
            <input type="text" class="input" v-model="form.email" placeholder="Email" />
          </div>
          <div class="form-group">
            <input type="password" class="input" v-model="form.password" placeholder="Mot de passe" />
          </div>
          <!-- <div class="form-group">
            <input type="password" class="input" v-model="form.password_confirmation" placeholder="Confirmer mot de passe" />
          </div> -->
          <div class="form-group">
            <button type="submit" class="button">Créer un compte</button>
          </div>
          <p class="register">
            Déjà inscrit ?
            <router-link to="/login">
              Connectez-vous
            </router-link>
          </p>
        </div>
      </div>
    </form>
  </div>
</template>

<style scoped>
.top-container {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding: 3vw 2vw;
  flex-direction: row;
  gap: 3vw;
}

.login {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background-color: #d2baaa;
  padding: 2vw 2vw;
}

.register {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background-color: #d2baaa;
  padding: 2vw 2vw;
}

.form-title {
  text-align: center;
}

.button {
  width: fit-content;
  padding: 0 1vw;
  height: 2.3em;
  margin: 0.5em;
  background: white;
  color: #A78770;
  border: none;
  border-radius: 0.625em;
  font-size: 20px;
  font-weight: bold;
  cursor: pointer;
  position: relative;
  z-index: 1;
  overflow: hidden;
}

button:hover {
  color: white;
}

button:after {
  content: "";
  background: black;
  position: absolute;
  z-index: -1;
  left: -20%;
  right: -20%;
  top: 0;
  bottom: 0;
  transform: skewX(-45deg) scale(0, 1);
  transition: all 0.5s;
}

button:hover:after {
  transform: skewX(-45deg) scale(1, 1);
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
}


.container-champ {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;
  gap: 2vw;
}
</style>