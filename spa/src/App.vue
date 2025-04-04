<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import * as AuthService from './_services/AuthService.ts'
import { useUserStore } from '@/stores/User'
import { useProductStore } from '@/stores/Product'

const User = useUserStore();
const Product = useProductStore();
</script>

<template>
  <header>
    <div class="logo">
      <router-link to='/home' type="button">
        <img alt="Vue logo" src="@/assets/LogoWindigo-preview.png" />
      </router-link>
    </div>
    <div class="container-header">
      <div class="wrapper">
        <div class="greetings">
          <!-- <h1 class="green">{{ msg }}</h1> -->
          <h3>
            <router-link to='/Boutique' type="button">
              <a href="#" class="nav-item is-active" target="_blank" rel="noopener">BOUTIQUE</a>
            </router-link>
            <router-link to='/Ateliers' type="button">
              <a href="#" class="nav-item" target="_blank" rel="noopener">ATELIERS</a>
            </router-link>
            <router-link to='/PortFolio' type="button">
              <a href="#" class="nav-item">PORT-FOLIO</a>
            </router-link>
            <router-link to='/About' type="button">
              <a href="#" class="nav-item" data-active-color="black" data-target="AboutView">A PROPOS</a>
            </router-link>
            <span class="nav-indicator"></span>
          </h3>
        </div>
      </div>
    </div>
    <nav class="nav-auth">
      <div v-if="User.isLogged">
        <!-- <router-link to='/product-create' v-if="User.isLogged">Créer</router-link> | -->
        <span>{{ User.user.email }}</span>
      </div>
      <router-link to='/login' type="button" class="btn btn-outline-secondary" v-if="!User.isLogged"><img
          src="@/assets/account.svg" /></router-link>
      <button type="button" class="btn btn-outline-secondary" @click="AuthService.logout()"
        v-if="User.isLogged">Déconnexion</button>
    </nav>
  </header>
  <RouterView />

  <footer>
    <div class="container-footer">
      <div class="container-left">
        <div class="container-res">
          <div class="icon facebook">
            <span class="tooltip">Facebook</span>
            <a href="https://www.facebook.com/windigo.serigraphie">
              <svg viewBox="0 0 320 512" height="1.2em" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                </path>
              </svg>
            </a>
          </div>
          <div class="icon instagram">
            <span class="tooltip">Instagram</span>
            <a href="https://www.instagram.com/windigo.serigraphie/">
              <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" fill="currentColor" class="bi bi-instagram"
                viewBox="0 0 16 16">
                <path
                  d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                </path>
              </svg>
            </a>
          </div>
          <div class="container-copyright">
            <h6> Les photos sont des propriétés intellectuelles, toute reproduction est interdite.
            </h6>
          </div>
        </div>

      </div>
      <div class="container-coordonnées">
        <div class="adresse">
          <div class="Windigo-serigraphie">WINDIGO-SERIGRAPHIE</div>
          <div class="localisation">
            <h6>6 rue des acacias</h6>
            <h6>72000 LE MANS</h6>
          </div>
        </div>
      </div>
      <div class="container-right">
        <div class="telephone">
          <h6>06 XX XX XX XX</h6>
          <h6>02 XX XX XX XX</h6>
        </div>
        <div class="container-ancre">
          <div class="ancre-nav">
            <h6>Accueil</h6> |
            <h6>Mon compte</h6>
          </div>
          <div class="ancre-legal">
            <h6>Politique de confidientialité </h6> |
            <h6>Mentions légales</h6>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<style scoped>
/*Gestion du header*/
header {
  width: 100%;
  height: auto;
  background-color: #A88871;
  line-height: 1.5;
  max-height: 100vh;
  justify-content: center;
  align-items: center;
  display: flex;
  flex-direction: row;
  padding: 1rem;
}

.nav-item {
  color: #000000;
  font-family: arial, sans-serif;
  font-size: 1vw;
  padding: 1vw;
  width: 100%;
  margin: 0 6px;
  position: relative;
}

.nav-item:before {
  content: "";
  position: absolute;
  bottom: -2vw;
  background-color: #dfe2ea;
  height: 1vw;
  padding: 0.5vw;
  right: 0;
  border-radius: 8px 8px 0 0;
  left: 0;
  transition: .3s;
}

.nav-item:not(.is-active):hover:before {
  bottom: 0;
}

.nav-item:not(.is-active):hover {
  color: #333;
}

.nav-indicator {
  position: absolute;
  left: 0;
  bottom: 0;
  height: 5px;
  transition: .4s;
  border-radius: 8px 8px 0 0;
}

h1 {
  font-weight: 500;
  font-size: 2.6rem;
  position: relative;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
  padding: 1vw;
  width: 100%;
}

h3 a {
  padding: 0 2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

.container-header {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

/*Fin gestion du header*/

/*Gestion du footer*/
footer {
  text-align: center;
  padding: 5px;
  background-color: #A88871;
  color: black;
}

.container-footer {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
}

.container-left {
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  flex: 1;
}

.container-res {
  display: inline-flex;
  list-style: none;
  height: 120px;
  width: 100%;
  font-family: "Poppins", sans-serif;
  justify-content: center;
  align-items: center;
}

.container-res .icon {
  position: relative;
  background: #fff;
  border-radius: 50%;
  margin: 10px;
  width: 50x;
  min-width: 50px;
  height: 50px;
  font-size: 18px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.container-res .tooltip {
  position: absolute;
  top: 0;
  font-size: 14px;
  background: #fff;
  color: #fff;
  padding: 5px 8px;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.container-res .tooltip::before {
  position: absolute;
  content: "";
  height: 8px;
  width: 8px;
  background: #fff;
  bottom: -3px;
  left: 50%;
  transform: translate(-50%) rotate(45deg);
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.container-res .icon:hover .tooltip {
  top: -45px;
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}

.container-res .icon:hover span,
.container-res .icon:hover .tooltip {
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
}

.container-res .facebook:hover,
.container-res .facebook:hover .tooltip,
.container-res .facebook:hover .tooltip::before {
  background: #1877f2;
  color: #fff;
}

.container-res .instagram:hover,
.container-res .instagram:hover .tooltip,
.container-res .instagram:hover .tooltip::before {
  background: #e4405f;
  color: #fff;
}


.container-copyright {
  display: flex;
  list-style: none;
  height: 120px;
  width: 100%;
  justify-content: center;
  align-items: center;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  justify-content: center;
}

.container-coordonnées {
  width: 100%;
  display: flex;
  flex: 1;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  margin: 0 10px;
}

.adresse {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.windigo-serigraphie {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.localisation {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.telephone {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.container-right {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  flex: 1;
}

.container-ancre {
  display: flex;
  flex-direction: column;
}

.ancre-nav {
  display: flex;
}

.ancre-legal {
  display: flex;
}

/*Fin gestion du footer*/

/*Gestion du logo*/
.logo {
  display: block;
  width: 8%;
  height: auto;
  position: relative;
}

.logo img {
  width: 100%;
  height: auto;
  object-fit: cover;
}

/*Fin gestion du logo*/
nav {
  width: 20%;
  font-size: 12px;
  text-align: right;
  display: flex;
  flex-direction: column;
  color: black;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-direction: column;
    justify-content: center;
    align-items: center;

  }

  nav {
    text-align: center;
    font-size: 1rem;
    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
