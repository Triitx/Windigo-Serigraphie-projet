import { defineStore } from "pinia"
import WorkshopService from "@/_services/WorkshopService"
import type { Workshop, WorkshopSession } from "@/_models/Workshop"
import type { Reservation } from "@/_models/Reservation"

export const useWorkshopStore = defineStore("workshops", {
  state: () => ({
    workshops: [] as Workshop[],
    sessions: [] as WorkshopSession[],
    reservations: [] as Reservation[],
    currentWorkshop: null as Workshop | null, // pour stocker un atelier sélectionné
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

    async fetchWorkshopById(id: number) {
      this.loading = true
      this.error = null
      try {
        const res = await WorkshopService.getById(id)
        this.currentWorkshop = res.data
      } catch (err: any) {
        this.error = err.message
        this.currentWorkshop = null
      } finally {
        this.loading = false
      }
    },

    async createWorkshop(workshop: FormData) {
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

    async updateWorkshop(id: number, workshop: FormData) {
      this.loading = true
      this.error = null
      try {
        const res = await WorkshopService.update(id, workshop)
        const idx = this.workshops.findIndex(w => w.id === id)
        if (idx !== -1) this.workshops[idx] = res.data
        if (this.currentWorkshop?.id === id) {
          this.currentWorkshop = res.data
        }
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
        if (this.currentWorkshop?.id === id) {
          this.currentWorkshop = null
        }
      } catch (err: any) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    },

    // Réservations
    async bookSession(sessionId: number) {
      this.loading = true
      this.error = null
      try {
        const res = await WorkshopService.bookSession(sessionId)
        this.reservations.push(res.data)
        return res.data
      } catch (err: any) {
        this.error = err.message
        return null
      } finally {
        this.loading = false
      }
    },

    async cancelBooking(reservationId: number) {
      this.loading = true
      this.error = null
      try {
        await WorkshopService.cancelBooking(reservationId)
        this.reservations = this.reservations.filter(r => r.id !== reservationId)
      } catch (err: any) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    }
  }
})
