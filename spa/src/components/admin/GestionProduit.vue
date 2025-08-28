<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useProductStore } from '@/stores/Product';
import type { Product } from '@/_models/Product';

const store = useProductStore();
const showForm = ref(false);
const editingProduct = ref<Product | null>(null);

// Formulaire initial pour nouvel ajout
function getEmptyProduct(): Product {
  return {
    id: 0,
    name: '',
    price: 0,
    stock: 0,
    description: '',
    archived: false,
    picture: null,
    category: undefined,
    option: undefined
  };
}

onMounted(async () => {
  await store.fetchAdminProducts();
});

function startEdit(product?: Product) {
  if (product) {
    editingProduct.value = { ...product };
  } else {
    editingProduct.value = getEmptyProduct();
  }
  showForm.value = true;
}

function cancelEdit() {
  editingProduct.value = null;
  showForm.value = false;
}

async function saveProduct() {
  if (!editingProduct.value) return;
  try {
    if (editingProduct.value.id && editingProduct.value.id > 0) {
      await store.updateAdminProduct(editingProduct.value.id, editingProduct.value);
    } else {
      await store.createAdminProduct(editingProduct.value);
    }
    showForm.value = false;
    editingProduct.value = null;
  } catch (error) {
    console.error('Erreur sauvegarde produit :', error);
  }
}

async function deleteProduct(id: number) {
  if (!confirm('Voulez-vous vraiment supprimer ce produit ?')) return;
  try {
    await store.deleteAdminProduct(id);
  } catch (error) {
    console.error('Erreur suppression produit :', error);
  }
}
</script>

<template>
  <div class="container my-5">
    <h2>Gestion Produits</h2>
    <button class="btn btn-success mb-3" @click="startEdit()">Ajouter un produit</button>

    <!-- Formulaire -->
    <div v-if="showForm" class="card p-3 mb-4">
      <input v-model="editingProduct!.name" class="form-control mb-2" placeholder="Nom" />
      <input type="number" v-model.number="editingProduct!.price" class="form-control mb-2" placeholder="Prix" />
      <input type="number" v-model.number="editingProduct!.stock" class="form-control mb-2" placeholder="Stock" />
      <textarea v-model="editingProduct!.description" class="form-control mb-2" placeholder="Description"></textarea>

      <button class="btn btn-primary me-2" @click="saveProduct">Enregistrer</button>
      <button class="btn btn-secondary" @click="cancelEdit">Annuler</button>
    </div>

    <!-- Table produits -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prix</th>
          <th>Stock</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in store.products" :key="product.id">
          <td>{{ product.name }}</td>
          <td>{{ product.price }} €</td>
          <td>{{ product.stock }}</td>
          <td>{{ product.description }}</td>
          <td>
            <button class="btn btn-sm btn-warning me-2" @click="startEdit(product)">Modifier</button>
            <button class="btn btn-sm btn-danger" @click="deleteProduct(product.id)">Supprimer</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
