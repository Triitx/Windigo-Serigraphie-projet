// src/stores/workshopStore.ts
import { defineStore } from "pinia"
import WorkshopService from "@/_services/WorkshopService"
import type { Workshop } from "@/_models/Workshop"
import type { WorkshopSession } from "@/_models/Workshop"
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
    // --- Chargement des ateliers ---
    async fetchWorkshops(isAdmin = false) {
      try {
        this.loading = true
        if (isAdmin) {
          const res = await WorkshopService.getAll() // tu peux faire un endpoint séparé si besoin
          this.workshops = res.data
        } else {
          const res = await WorkshopService.getAll()
          this.workshops = res.data
        }
      } catch (err: any) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    },

    async fetchSessions(workshopId: number, isAdmin = false) {
      try {
        this.loading = true
        if (isAdmin) {
          // ⚡ Admin : récupère toutes les sessions de l’atelier
          // (si tu as une route spéciale pour ça, sinon utilise getById et prends .workshopSessions)
          const res = await WorkshopService.getById(workshopId)
          this.sessions = res.data.workshopSessions ?? []
        } else {
          // ⚡ User : uniquement sessions dispo
          const res = await WorkshopService.getAvailableSessions(workshopId)
          this.sessions = res.data
        }
      } catch (err: any) {
        this.error = err.message
      } finally {
        this.loading = false
      }
    },

    // --- Réservations utilisateur ---
    async fetchMyBookings() {
      const res = await WorkshopService.getMyBookings()
      this.reservations = res.data
    },

    async reserveSession(sessionId: number) {
      await WorkshopService.bookSession(sessionId)
      this.fetchMyBookings()
    },

    async cancelReservation(reservationId: number) {
      await WorkshopService.cancelBooking(reservationId)
      this.fetchMyBookings()
    },

    // --- Admin Workshops ---
    async createWorkshop(workshop: Partial<Workshop>) {
      const res = await WorkshopService.create(workshop)
      this.workshops.push(res.data)
    },

    async updateWorkshop(id: number, workshop: Partial<Workshop>) {
      const res = await WorkshopService.update(id, workshop)
      const idx = this.workshops.findIndex(w => w.id === id)
      if (idx !== -1) this.workshops[idx] = res.data
    },

    async deleteWorkshop(id: number) {
      await WorkshopService.delete(id)
      this.workshops = this.workshops.filter(w => w.id !== id)
    },

    // --- Admin Sessions ---
    async createSession(workshopId: number, session: Partial<WorkshopSession>) {
      const res = await WorkshopService.createSession(workshopId, session)
      this.sessions.push(res.data)
    },

    async updateSession(workshopId: number, sessionId: number, session: Partial<WorkshopSession>) {
      const res = await WorkshopService.updateSession(workshopId, sessionId, session)
      const idx = this.sessions.findIndex(s => s.id === sessionId)
      if (idx !== -1) this.sessions[idx] = res.data
    },

    async deleteSession(workshopId: number, sessionId: number) {
      await WorkshopService.deleteSession(workshopId, sessionId)
      this.sessions = this.sessions.filter(s => s.id !== sessionId)
    }
  }
})
