import type { Workshop } from "./Workshop"

export interface WorkshopSession {
  id: number
  workshop_id: number
  date: string // ISO date string
  capacity: number
  remaining_places: number

  // Relation
  workshop?: Workshop
}
