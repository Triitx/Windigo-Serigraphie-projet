<template>
  <div class="p-4">
    <h2 class="text-xl font-semibold mb-4">Gestion des Catégories</h2>

    <table class="w-full border border-gray-300 mb-6">
      <thead class="bg-gray-100">
        <tr>
          <th class="border px-2 py-1">ID</th>
          <th class="border px-2 py-1">Nom</th>
          <th class="border px-2 py-1">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="cat in store.categories" :key="cat.id">
          <td class="border px-2 py-1">{{ cat.id }}</td>
          <td class="border px-2 py-1">{{ cat.name }}</td>
          <td class="border px-2 py-1 space-x-2">
            <button @click="editCategory(cat)" class="px-2 py-1 bg-yellow-400 rounded">✏️</button>
            <button @click="deleteCategory(cat.id)" class="px-2 py-1 bg-red-500 text-white rounded">🗑️</button>
          </td>
        </tr>
      </tbody>
    </table>

    <form @submit.prevent="saveCategory" class="space-y-3">
      <input v-model="form.name" placeholder="Nom" class="border p-2 w-full" required />
      <button class="px-4 py-2 bg-blue-600 text-white rounded">
        {{ form.id ? "Mettre à jour" : "Créer" }}
      </button>
      <button type="button" @click="resetForm" class="px-4 py-2 bg-gray-300 rounded">Annuler</button>
    </form>

    <div v-if="store.loading" class="mt-4 text-blue-600">Chargement...</div>
    <div v-if="store.error" class="mt-4 text-red-600">{{ store.error }}</div>
  </div>
</template>

<script setup lang="ts">
import { reactive, onMounted } from 'vue'
import { useCategoryStore } from '@/stores/Category'
import type { Category } from '@/_models/Category'

const store = useCategoryStore()
const form = reactive<Category>({ id: 0, name: '' })

onMounted(() => store.fetchAdminCategories())

const saveCategory = async () => {
  if (form.id) {
    await store.updateAdminCategory(form.id, form)
  } else {
    await store.createAdminCategory(form)
  }
  resetForm()
}

const editCategory = (cat: Category) => Object.assign(form, cat)
const resetForm = () => { form.id = 0; form.name = '' }
const deleteCategory = async (id: number) => {
  if (confirm("Voulez-vous supprimer cette catégorie ?")) {
    await store.deleteAdminCategory(id)
  }
}
</script>
