import Axios from './CallerService'
import type { Workshop } from '@/_models/Workshop'

// -------------------
// PUBLIC (affichage)
// -------------------
export async function getWorkshops(): Promise<Workshop[]> {
  const res = await Axios.get('api/workshops')
  return res.data.workshops ?? res.data // selon ton retour API
}

export async function getWorkshop(id: number): Promise<Workshop> {
  const res = await Axios.get(`api/workshops/${id}`)
  return res.data
}

// -------------------
// ADMIN (back-office)
// -------------------
export async function getAdminWorkshops(): Promise<Workshop[]> {
  const res = await Axios.get('api/admin/workshops')
  return res.data
}

export async function getAdminWorkshop(id: number): Promise<Workshop> {
  const res = await Axios.get(`api/admin/workshops/${id}`)
  return res.data
}

export async function createAdminWorkshop(data: Workshop): Promise<Workshop> {
  const res = await Axios.post('api/admin/workshops', data)
  return res.data
}

export async function updateAdminWorkshop(id: number, data: Workshop): Promise<Workshop> {
  const res = await Axios.put(`api/admin/workshops/${id}`, data)
  return res.data
}

export async function deleteAdminWorkshop(id: number): Promise<void> {
  await Axios.delete(`api/admin/workshops/${id}`)
}
