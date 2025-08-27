import Axios from './CallerService'
import type { CartItem } from '@/stores/Cart'
import { useCartStore } from '@/stores/Cart'
import { getActivePinia } from 'pinia'

/**
 * Récupère le store CartStore actif
 */
function getCartStore(): ReturnType<typeof useCartStore> {
  const pinia = getActivePinia()
  if (!pinia) throw new Error('Pinia non initialisé. Assurez-vous d’avoir fait app.use(createPinia())')
  return useCartStore(pinia)
}

/**
 * Récupérer le panier complet
 */
export async function getCart() {
  const store = getCartStore()
  const res = await Axios.get('api/carts')
  store.setCart(res.data as CartItem[])
}

/**
 * Ajouter ou mettre à jour un produit avec quantité
 */
export async function setCart(productId: number, quantity: number) {
  await Axios.post('api/carts/set', { product_id: productId, quantity })
  await getCart()
}

/**
 * Ajouter +1 unité
 */
export async function addOne(productId: number) {
  await Axios.post(`api/carts/add/${productId}`)
  await getCart()
}

/**
 * Retirer -1 unité
 */
export async function removeOne(productId: number) {
  await Axios.post(`api/carts/remove/${productId}`)
  await getCart()
}

/**
 * Supprimer complètement un produit
 */
export async function removeFromCart(productId: number) {
  await Axios.delete(`api/carts/delete/${productId}`)
  await getCart()
}

/**
 * Vider le panier
 */
export async function clearCart() {
  const store = getCartStore()
  await Axios.delete('api/carts/clear')
  store.clearCart()
}
