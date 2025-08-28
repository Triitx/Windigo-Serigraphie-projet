import { defineStore } from 'pinia'
import type { Workshop } from '@/_models/Workshop'
import * as WorkshopService from '@/_services/WorkshopService'

export const useWorkshopStore = defineStore('workshops', {
  state: () => ({
    workshops: [] as Workshop[],
    currentWorkshop: null as Workshop | null,
    loading: false,
    error: null as string | null,
  }),

  actions: {
    // --------- PUBLIC ---------
    async fetchWorkshops() {
      this.loading = true
      this.error = null
      try {
        this.workshops = await WorkshopService.getWorkshops()
      } catch (err: any) {
        this.error = err.message || 'Erreur lors du chargement des ateliers'
      } finally {
        this.loading = false
      }
    },

    async fetchWorkshop(id: number) {
      this.loading = true
      this.error = null
      try {
        this.currentWorkshop = await WorkshopService.getWorkshop(id)
      } catch (err: any) {
        this.error = err.message || 'Erreur lors du chargement de l’atelier'
      } finally {
        this.loading = false
      }
    },

    // --------- ADMIN ---------
    async fetchAdminWorkshops() {
      this.loading = true
      this.error = null
      try {
        this.workshops = await WorkshopService.getAdminWorkshops()
      } catch (err: any) {
        this.error = err.message || 'Erreur admin : chargement des ateliers'
      } finally {
        this.loading = false
      }
    },

    async createAdminWorkshop(data: Workshop) {
      this.loading = true
      this.error = null
      try {
        const newWorkshop = await WorkshopService.createAdminWorkshop(data)
        this.workshops.push(newWorkshop)
      } catch (err: any) {
        this.error = err.message || 'Erreur admin : création échouée'
      } finally {
        this.loading = false
      }
    },

    async updateAdminWorkshop(id: number, data: Workshop) {
      this.loading = true
      this.error = null
      try {
        const updated = await WorkshopService.updateAdminWorkshop(id, data)
        const index = this.workshops.findIndex(w => w.id === id)
        if (index !== -1) this.workshops[index] = updated
        if (this.currentWorkshop?.id === id) this.currentWorkshop = updated
      } catch (err: any) {
        this.error = err.message || 'Erreur admin : mise à jour échouée'
      } finally {
        this.loading = false
      }
    },

    async deleteAdminWorkshop(id: number) {
      this.loading = true
      this.error = null
      try {
        await WorkshopService.deleteAdminWorkshop(id)
        this.workshops = this.workshops.filter(w => w.id !== id)
      } catch (err: any) {
        this.error = err.message || 'Erreur admin : suppression échouée'
      } finally {
        this.loading = false
      }
    },
  },
})
