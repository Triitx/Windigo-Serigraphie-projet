// _services/ProductService.ts
import Axios from './CallerService';
import type { Product } from '@/_models/Product';

export async function getProducts(): Promise<Product[]> {
  const res = await Axios.get('api/products');
  return res.data.products; // <- il faut prendre la clé "products"
}


export async function getProduct(id: number): Promise<Product> {
  const res = await Axios.get(`api/products/${id}`);
  return res.data;
}
