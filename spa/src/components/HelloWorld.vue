<script setup lang="ts">
// const indicator = document.querySelector('nav-indicator');
// const items = document.querySelectorAll('.nav-item');

// function handleIndicator(el) {
// // Boucler sur items -> retirer la classe "is-active"
// items.forEach(item => {
//     item.classList.remove('is-active');
//     item.removeAttribute('style');
//   })
  
//   const elementColor = el.dataset.activeColor;
//   const target = el.dataset.target;
  
//   // Styliser l'indicateur
//   indicator.style.width = `${el.offsetWidth}px`;
//   indicator.style.backgroundColor = elementColor;
//   indicator.style.left = `${el.offsetLeft}px`;
  
//   // Ajout la classe is-active
//   el.classList.add('is-active');
//   el.style.color = elementColor;
// }

// items.forEach((item, index) => {
//   item.addEventListener('click', e => {
//     handleIndicator(e.target)
//   });
//   item.classList.contains('is-active') && handleIndicator(item);
// });
// defineProps<{
//   msg: string
// }>()
</script>

<template>
  
</template>

<style scoped>

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

/* @media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: center;
  }
} */
</style>
