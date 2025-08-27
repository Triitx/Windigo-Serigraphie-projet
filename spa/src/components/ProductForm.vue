<script setup lang="ts">
import { ref } from 'vue';
//import { ProductCategory, ProductOption } from '@/_models/Enums';
import type { Product } from '@/_models/Product';
import * as ProductService from '@/_services/ProductService';
//const types = Object.values(ProductCategory);
//const races = Object.values(ProductOption);
const product = ref<Product>({
  id: -1,
  name: '',
  price: 0,
  stock: 0,
  description: '',
  archived: false,
  option_id: 0,
 category_id: 0,
 picture : ''
});
const errors = ref<any>({});
function handleFileUpload(event: any) {
  product.value.picture = event.target.files[0];
}
function create() {
  errors.value = {};

  ProductService.createProduct(product.value).then(() => {
    }).catch(error => {
      errors.value = error.response.data.errors;
  });
}
</script>
<template>
  <!-- <div>
    <form @submit.prevent="create">
      <h2 class="form-title">{{ $t("PRODUCT.CREATE") }}</h2>
      <div class="form-group">
        <label for="creature_name">Name</label>
        <input type="text" id="creature_name" v-model="product.name" />
      </div>
      <div class="form-error">{{ errors?.name }}</div>
      <div class="form-group">
        <label for="creature_pv">PV</label>
        <input type="number" id="creature_pv" v-model="product.price" />
      </div>
      <div class="form-error">{{ errors?.pv }}</div>
      <div class="form-group">
        <label for="creature_atk">ATK</label>
        <input type="number" id="creature_atk" v-model="product.stock" />
      </div>
      <div class="form-error">{{ errors?.atk }}</div>
      <div class="form-group">
        <label for="creature_def">DEF</label>
        <input type="number" id="creature_def" v-model="product.description" />
      </div>
      <div class="form-error">{{ errors?.def }}</div>
      <div class="form-group">
        <label for="creature_speed">Speed</label>
        <input type="number" id="creature_speed" v-model="product.archived" />
      </div>
      <div class="form-error">{{ errors?.speed }}</div>
 <div class="form-group">
        <label for="creature_capture_rate">Capture Rate</label>

        <input type="number" id="creature_capture_rate" v- model="product.capture_rate" />

      </div>
      <div class="form-error">{{ errors?.capture_rate }}</div>
      <div class="form-group">

        <label for="creature_type">Type</label>
        <select id="creature_type" v-model="creature.type">
          <option v-for="type in types" :value="type">{{ $t("ENUMS.CREATURE_TYPE."

            + type) }}</option>
        </select>
      </div>
      <div class="form-error">{{ errors?.type }}</div>
      <div class="form-group">
        <label for="creature_race">Race</label>
        <select id="creature_race" v-model="creature.race">
          <option v-for="race in races" :value="race">{{ $t("ENUMS.CREATURE_RACE."

            + race) }}</option>
        </select>
      </div> 
      <div class="form-group">
        <label>File
          <input type="file" id="file" ref="inputFile" @change="handleFileUpload($event)" />
        </label>
      </div>
      <div class="form-error">{{ errors?.avatar }}</div>
      <div class="form-group">
        <button type="submit" class="button">Créer</button>
      </div>
    </form>
  </div> -->
</template>