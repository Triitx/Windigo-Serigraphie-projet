<template>
  <div class="p-4">
    <h2 class="text-xl font-semibold mb-4">Gestion des Ateliers</h2>

    <table class="w-full border border-gray-300 mb-6">
      <thead class="bg-gray-100">
        <tr>
          <th class="border px-2 py-1">ID</th>
          <th class="border px-2 py-1">Nom</th>
          <th class="border px-2 py-1">Type</th>
          <th class="border px-2 py-1">Prix</th>
          <th class="border px-2 py-1">Durée</th>
          <th class="border px-2 py-1">Age</th>
          <th class="border px-2 py-1">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="workshop in store.workshops" :key="workshop.id">
          <td class="border px-2 py-1">{{ workshop.id }}</td>
          <td class="border px-2 py-1">{{ workshop.name }}</td>
          <td class="border px-2 py-1">{{ workshop.type }}</td>
          <td class="border px-2 py-1">{{ workshop.price }} €</td>
          <td class="border px-2 py-1">{{ workshop.duration }} min</td>
          <td class="border px-2 py-1">{{ workshop.age }} ans</td>
          <td class="border px-2 py-1 space-x-2">
            <button @click="editWorkshop(workshop)" class="px-2 py-1 bg-yellow-400 rounded">✏️</button>
            <button @click="deleteWorkshop(workshop.id)" class="px-2 py-1 bg-red-500 text-white rounded">🗑️</button>
          </td>
        </tr>
      </tbody>
    </table>

    <form @submit.prevent="saveWorkshop" class="space-y-3">
      <input v-model="form.name" placeholder="Nom" class="border p-2 w-full" required />
      <input v-model="form.type" placeholder="Type" class="border p-2 w-full" required />
      <input v-model.number="form.price" type="number" placeholder="Prix" class="border p-2 w-full" required />
      <input v-model.number="form.duration" type="number" placeholder="Durée (min)" class="border p-2 w-full" required />
      <input v-model.number="form.age" type="number" placeholder="Age minimum" class="border p-2 w-full" required />
      <div class="space-x-2">
        <button class="px-4 py-2 bg-blue-600 text-white rounded" :disabled="store.loading">
          {{ form.id ? "Mettre à jour" : "Créer" }}
        </button>
        <button type="button" @click="resetForm" class="px-4 py-2 bg-gray-300 rounded">Annuler</button>
      </div>
    </form>

    <div v-if="store.loading" class="mt-4 text-blue-600">Chargement...</div>
    <div v-if="store.error" class="mt-4 text-red-600">{{ store.error }}</div>
  </div>
</template>

<script setup lang="ts">
import { reactive, onMounted } from 'vue'
import { useWorkshopStore } from '@/stores/Workshop'
import type { Workshop } from '@/_models/Workshop'

const store = useWorkshopStore()

const form = reactive<Workshop>({
  id: 0,
  name: '',
  type: '',
  price: 0,
  duration: 0,
  age: 0,
})

// Chargement initial des ateliers admin
onMounted(() => store.fetchWorkshops(true))

const saveWorkshop = async () => {
  store.loading = true
  try {
    if (form.id) {
      // Mise à jour
      await store.updateWorkshop(form.id, form)
      // L’update dans le store met déjà à jour workshops, pas besoin de modifier ici
    } else {
      // Création
      await store.createWorkshop(form)
      // Le store ajoute déjà l’atelier créé dans workshops
    }
    resetForm()
  } catch (err: any) {
    store.error = err.message
  } finally {
    store.loading = false
  }
}

const editWorkshop = (workshop: Workshop) => {
  Object.assign(form, workshop)
}

const resetForm = () => {
  form.id = 0
  form.name = ''
  form.type = ''
  form.price = 0
  form.duration = 0
  form.age = 0
}

const deleteWorkshop = async (id: number) => {
  if (confirm("Voulez-vous vraiment supprimer cet atelier ?")) {
    store.loading = true
    try {
      await store.deleteWorkshop(id)
      store.workshops = store.workshops.filter(w => w.id !== id)
    } catch (err: any) {
      store.error = err.message
    } finally {
      store.loading = false
    }
  }
}
</script>
