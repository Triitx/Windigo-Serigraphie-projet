<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useProductStore } from '@/stores/Product';
import { useCartStore } from '@/stores/Cart';
import { getProducts } from '@/_services/ProductService';
import { setCart } from '@/_services/CartService';

const productStore = useProductStore();
const cartStore = useCartStore();
const quantities = ref<{ [key: number]: number }>({});

onMounted(async () => {
  try {
    const data = await getProducts();
    productStore.setProducts(data);
    data.forEach(p => quantities.value[p.id] = 1);
  } catch (error) {
    console.error('Erreur récupération produits :', error);
  }
});

async function handleAddToCart(productId: number) {
  try {
    const quantity = quantities.value[productId] || 1;
    await setCart(productId, quantity);
    alert('Produit ajouté au panier !');
  } catch (error) {
    console.error('Erreur ajout au panier :', error);
  }
}
</script>

<template>
  <div class="container my-5">
    <h2 class="mb-4">Boutique</h2>
    <div class="row">
      <div v-for="product in productStore.products" :key="product.id" class="col-md-4 mb-4">
        <div class="card h-100 p-3 shadow-sm">
          <div v-if="product.picture" class="mb-2">
            <img :src="product.picture" :alt="product.name" class="img-fluid rounded" />
          </div>
          <h5 class="card-title">{{ product.name }}</h5>
          <p class="card-text">{{ product.description }}</p>
          <p class="fw-bold">{{ product.price }} €</p>
          <p v-if="product.stock !== undefined">Stock : {{ product.stock }}</p>

          <input type="number" min="1" :max="product.stock" v-model.number="quantities[product.id]" class="form-control mb-2" />

          <button class="btn btn-primary w-100" @click="handleAddToCart(product.id)">
            Ajouter au panier
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card { transition: transform 0.2s; }
.card:hover { transform: translateY(-5px); }
</style>
