import { defineStore } from "pinia"
import WorkshopService from "@/_services/WorkshopService"
import type { Workshop, WorkshopSession } from "@/_models/Workshop"
import type { Reservation } from "@/_models/Reservation"

export const useWorkshopStore = defineStore("workshops", {
  state: () => ({
    workshops: [] as Workshop[],
    sessions: [] as WorkshopSession[],
    reservations: [] as Reservation[],
    loading: false,
    error: null as string | null
  }),

  actions: {
    async fetchWorkshops(isAdmin = false) {
      this.loading = true
      this.error = null
      try {
        const res = await WorkshopService.getAll()
        this.workshops = res.data
      } catch (err: any) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    },

    async createWorkshop(workshop: Partial<Workshop>) {
      this.loading = true
      this.error = null
      try {
        const res = await WorkshopService.create(workshop)
        this.workshops.push(res.data)
      } catch (err: any) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    },

    async updateWorkshop(id: number, workshop: Partial<Workshop>) {
      this.loading = true
      this.error = null
      try {
        const res = await WorkshopService.update(id, workshop)
        const idx = this.workshops.findIndex(w => w.id === id)
        if (idx !== -1) this.workshops[idx] = res.data
      } catch (err: any) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    },

    async deleteWorkshop(id: number) {
      this.loading = true
      this.error = null
      try {
        await WorkshopService.delete(id)
        this.workshops = this.workshops.filter(w => w.id !== id)
      } catch (err: any) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    }
  }
})
