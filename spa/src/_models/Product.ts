import type { Category } from "./Category"
import type { Option } from "./Option"

export interface Product {
  id: number
  name: string
  price: number
  stock: number
  description: string
  archived: boolean
  picture?: string | null

  // Relations
  category?: Category
  option?: Option
}
