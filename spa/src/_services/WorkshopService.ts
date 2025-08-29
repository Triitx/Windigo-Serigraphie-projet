// src/_services/WorkshopService.ts
import Axios from "./CallerService"
import type { Workshop, WorkshopSession } from "@/_models/Workshop"
import type { Reservation } from "@/_models/Reservation"

const WorkshopService = {
  // --- Utilisateur (consultation) ---
  async getAll() {
    return Axios.get<Workshop[]>("/api/workshops")
  },

  async getById(id: number) {
    return Axios.get<Workshop>(`/api/workshops/${id}`)
  },

  async getAvailableSessions(workshopId: number) {
    return Axios.get<WorkshopSession[]>(`/api/workshops/${workshopId}/sessions/available`)
  },

  // --- Réservations utilisateur ---
  async getMyBookings() {
    return Axios.get<Reservation[]>("/api/bookings")
  },

  async bookSession(sessionId: number) {
    return Axios.post(`/api/bookings/${sessionId}`)
  },

  async cancelBooking(reservationId: number) {
    return Axios.delete(`/api/bookings/${reservationId}`)
  },

  // --- Admin (gestion ateliers) ---
  async create(workshop: Partial<Workshop>) {
    return Axios.post("/api/admin/workshops", workshop)
  },

  async update(id: number, workshop: Partial<Workshop>) {
    return Axios.put(`/api/admin/workshops/${id}`, workshop)
  },

  async delete(id: number) {
    return Axios.delete(`/api/admin/workshops/${id}`)
  },

  // --- Admin (gestion sessions) ---
  async createSession(workshopId: number, session: Partial<WorkshopSession>) {
    return Axios.post(`/api/admin/workshops/${workshopId}/sessions`, session)
  },

  async updateSession(workshopId: number, sessionId: number, session: Partial<WorkshopSession>) {
    return Axios.put(`/api/admin/workshops/${workshopId}/sessions/${sessionId}`, session)
  },

  async deleteSession(workshopId: number, sessionId: number) {
    return Axios.delete(`/api/admin/workshops/${workshopId}/sessions/${sessionId}`)
  }
}

export default WorkshopService
