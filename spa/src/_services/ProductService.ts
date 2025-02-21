// _services/CreatureService.ts
import Axios from './CallerService';
import type { Product } from '@/_models/Product';

export async function getProducts(): Promise<Product[]> {
  const res = await Axios.get('/Product');
  return res.data;
}

export async function getProduct(id: number): Promise<Product> {
  const res = await Axios.get('/Product/' + id);
  return res.data;
}

export async function createProduct(Product: Product): Promise<Product> {
  const res = await Axios.post('/products', Product, {
    headers: { 'Content-Type': 'multipart/form-data' }
  });
  
  return res.data;
}

export async function updateProduct(Product: Product): Promise<any> {
  const res = await Axios.post('/Product/' + Product.id, { ...Product, _method: 'PUT' }, {
    headers: { 'Content-Type': 'multipart/form-data' }
  });
  
  return res.data;
}

export async function Product(id: number): Promise<any> {
  return await Axios.delete('/Product/' + id);
}