<template>
  <div class="product-list">
    <h1>Liste des produits</h1>

    <table border="1" cellpadding="6" cellspacing="0">
      <thead>
        <tr>
          <th>Image</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Stock</th>
          <th>Catégorie</th>
          <th>Option</th>
          <th>Archivé</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id">
          <td>
            <img 
              v-if="product.picture" 
              :src="`http://localhost:8000/storage/${product.picture}`" 
              alt="product" 
              width="60"
            />
            <span v-else>—</span>
          </td>
          <td>{{ product.name }}</td>
          <td>{{ product.price }} €</td>
          <td>{{ product.stock }}</td>
          <td>{{ product.category?.name || '-' }}</td>
          <td>{{ product.option?.name || '-' }}</td>
          <td>{{ product.archived ? 'Oui' : 'Non' }}</td>
          <td>
            <button @click="editProduct(product.id)">Modifier</button>
            <button @click="deleteProduct(product.id)">Supprimer</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import Axios from '@/_services/CallerService';

export default {
  data() {
    return {
      products: []
    }
  },
  mounted() {
    this.loadProducts();
  },
  methods: {
    loadProducts() {
      Axios.get('/admin/products')
        .then(res => {
          this.products = res.data;
        })
        .catch(err => {
          console.error("Impossible de charger les produits", err);
        });
    },
    editProduct(id) {
      this.$router.push(`/admin/products/${id}/edit`);
    },
    deleteProduct(id) {
      if (confirm("Voulez-vous vraiment supprimer ce produit ?")) {
        Axios.delete(`/admin/products/${id}`)
          .then(() => {
            this.products = this.products.filter(p => p.id !== id);
          })
          .catch(err => {
            console.error("Erreur suppression produit", err);
          });
      }
    }
  }
}
</script>

<style scoped>
.product-list {
  padding: 20px;
}
table {
  width: 100%;
  border-collapse: collapse;
}
th {
  background-color: #f0f0f0;
}
button {
  margin: 0 5px;
}
</style>
