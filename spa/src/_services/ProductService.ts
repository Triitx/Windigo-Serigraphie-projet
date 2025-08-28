import Axios from './CallerService';
import type { Product } from '@/_models/Product';

// -------------------
// PUBLIC (BOUTIQUE)
// -------------------
export async function getProducts(): Promise<Product[]> {
  const res = await Axios.get('api/products');
  return res.data.products;
}

export async function getProduct(id: number): Promise<Product> {
  const res = await Axios.get(`api/products/${id}`);
  return res.data;
}

// -------------------
// ADMIN (BACK-OFFICE)
// -------------------
export async function getAdminProducts(): Promise<Product[]> {
  const res = await Axios.get('api/admin/products');
  return res.data;
}

export async function getAdminProduct(id: number): Promise<Product> {
  const res = await Axios.get(`api/admin/products/${id}`);
  return res.data;
}

export async function createAdminProduct(data: Product | FormData): Promise<Product> {
  const res = await Axios.post('api/admin/products', data);
  return res.data;
}

export async function updateAdminProduct(id: number, data: Product | FormData): Promise<Product> {
  const res = await Axios.post(`api/admin/products/${id}?_method=PUT`, data);
  return res.data;
}

export async function deleteAdminProduct(id: number): Promise<void> {
  await Axios.delete(`api/admin/products/${id}`);
}
