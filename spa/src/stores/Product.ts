import type { Product } from '@/_models/Product';
import { defineStore } from 'pinia';

interface ProductState {
  products: Product[];
}

export const useProductStore = defineStore('product', {
  state: (): ProductState => ({
    products: []
  }),
  actions: {
    setProducts(products: Product[]) {
      this.products = products;
    }
  }
});

