// src/_services/WorkshopService.ts
import axios from "axios"
import type { Workshop } from "@/_models/Workshop"
import type { WorkshopSession } from "@/_models/Workshop"
import type { Reservation } from "@/_models/Reservation"

const API_URL = "http://localhost:8000/api"

const WorkshopService = {
  // --- Utilisateur (consultation) ---
  async getAll() {
    return axios.get<Workshop[]>(`${API_URL}/workshops`)
  },

  async getById(id: number) {
    return axios.get<Workshop>(`${API_URL}/workshops/${id}`)
  },

  async getAvailableSessions(workshopId: number) {
    return axios.get<WorkshopSession[]>(`${API_URL}/workshops/${workshopId}/sessions/available`)
  },

  // --- Réservations utilisateur ---
  async getMyBookings() {
    return axios.get<Reservation[]>(`${API_URL}/bookings`)
  },

  async bookSession(sessionId: number) {
    return axios.post(`${API_URL}/bookings/${sessionId}`)
  },

  async cancelBooking(reservationId: number) {
    return axios.delete(`${API_URL}/bookings/${reservationId}`)
  },

  // --- Admin (gestion ateliers) ---
  async create(workshop: Partial<Workshop>) {
    return axios.post(`${API_URL}/admin/workshops`, workshop)
  },

  async update(id: number, workshop: Partial<Workshop>) {
    return axios.put(`${API_URL}/admin/workshops/${id}`, workshop)
  },

  async delete(id: number) {
    return axios.delete(`${API_URL}/admin/workshops/${id}`)
  },

  // --- Admin (gestion sessions) ---
  async createSession(workshopId: number, session: Partial<WorkshopSession>) {
    return axios.post(`${API_URL}/admin/workshops/${workshopId}/sessions`, session)
  },

  async updateSession(workshopId: number, sessionId: number, session: Partial<WorkshopSession>) {
    return axios.put(`${API_URL}/admin/workshops/${workshopId}/sessions/${sessionId}`, session)
  },

  async deleteSession(workshopId: number, sessionId: number) {
    return axios.delete(`${API_URL}/admin/workshops/${workshopId}/sessions/${sessionId}`)
  }
}

export default WorkshopService
