import Axios from './CallerService'
import type { Category } from '@/_models/Category'

// PUBLIC
export async function getCategories(): Promise<Category[]> {
  const res = await Axios.get('api/categories')
  return res.data.categories ?? res.data
}

export async function getCategory(id: number): Promise<Category> {
  const res = await Axios.get(`api/categories/${id}`)
  return res.data
}

// ADMIN
export async function getAdminCategories(): Promise<Category[]> {
  const res = await Axios.get('api/admin/categories')
  return res.data
}

export async function createAdminCategory(data: Category): Promise<Category> {
  const res = await Axios.post('api/admin/categories', data)
  return res.data
}

export async function updateAdminCategory(id: number, data: Category): Promise<Category> {
  const res = await Axios.put(`api/admin/categories/${id}`, data)
  return res.data
}

export async function deleteAdminCategory(id: number): Promise<void> {
  await Axios.delete(`api/admin/categories/${id}`)
}
