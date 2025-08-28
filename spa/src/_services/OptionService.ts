import Axios from './CallerService'
import type { Option } from '@/_models/Option'

// PUBLIC
export async function getOptions(): Promise<Option[]> {
  const res = await Axios.get('api/options')
  return res.data.options ?? res.data
}

export async function getOption(id: number): Promise<Option> {
  const res = await Axios.get(`api/options/${id}`)
  return res.data
}

// ADMIN
export async function getAdminOptions(): Promise<Option[]> {
  const res = await Axios.get('api/admin/options')
  return res.data
}

export async function createAdminOption(data: Option): Promise<Option> {
  const res = await Axios.post('api/admin/options', data)
  return res.data
}

export async function updateAdminOption(id: number, data: Option): Promise<Option> {
  const res = await Axios.put(`api/admin/options/${id}`, data)
  return res.data
}

export async function deleteAdminOption(id: number): Promise<void> {
  await Axios.delete(`api/admin/options/${id}`)
}
