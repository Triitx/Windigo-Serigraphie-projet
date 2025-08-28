import type { WorkshopSession } from "./WorkshopSession"

export interface Workshop {
  id: number
  name: string
  type: string
  price: number
  duration: number
  age: number

  // Relation
  workshopSessions?: WorkshopSession[]
}
