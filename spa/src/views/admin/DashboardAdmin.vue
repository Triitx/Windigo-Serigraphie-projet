<template>
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col">
      <h1 class="text-2xl font-bold p-4 border-b border-gray-700">Back Office</h1>
      <nav class="flex-1 p-4 space-y-2">
        <button
          v-for="link in links"
          :key="link.name"
          @click="currentTab = link.component"
          :class="[
            'block w-full text-left px-3 py-2 rounded',
            currentTab === link.component ? 'bg-gray-700' : 'hover:bg-gray-700'
          ]"
        >
          {{ link.name }}
        </button>
      </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6 overflow-auto bg-gray-100">
      <component :is="currentTab" />
    </main>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'

// Import des managers
import GestionProduit from '@/components/admin/GestionProduit.vue'
import GestionAtelier from '@/components/admin/GestionAtelier.vue'
import GestionCategorie from '@/components/admin/GestionCategorie.vue'
import GestionOption from '@/components/admin/GestionOption.vue'

const links = [
  { name: 'Produits', component: GestionProduit },
  { name: 'Ateliers', component: GestionAtelier },
  { name: 'Catégories', component: GestionCategorie },
  { name: 'Options', component: GestionOption },
]

const currentTab = ref(links[0].component)
</script>

<style scoped>
button {
  transition: background 0.2s;
}
</style>
