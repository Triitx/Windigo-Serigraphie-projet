<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'
import { useWorkshopStore } from '@/stores/Workshop'
import AppToast from '@/components/AppToast.vue' // ✅ toast réutilisable

const route = useRoute()
const workshopStore = useWorkshopStore()
const workshop = ref<any>(null)

// ✅ état du toast
const toastMessage = ref<string | null>(null)
const toastType = ref<'success' | 'danger'>('success')

onMounted(async () => {
  await workshopStore.fetchWorkshopById(Number(route.params.id))
  workshop.value = workshopStore.currentWorkshop
})

const formatDate = (dateStr: string) => {
  const d = new Date(dateStr)
  return d.toLocaleDateString('fr-FR', { weekday: 'long', day: '2-digit', month: 'long', year: 'numeric' })
}

const handleBooking = async (sessionId: number) => {
  const result = await workshopStore.bookSession(sessionId)

  if (result) {
    toastMessage.value = "Votre réservation a bien été enregistrée ✅"
    toastType.value = "success"
  } else {
    toastMessage.value = workshopStore.error || "Une erreur est survenue ❌"
    toastType.value = "danger"
  }
}
</script>

<template>
  <div class="container my-5" v-if="workshop">
    <h2 class="mb-3">{{ workshop.name }}</h2>
    <h5 class="text-muted">{{ workshop.type }}</h5>
    <p><strong>Prix :</strong> {{ workshop.price }} €</p>
    <p><strong>Durée :</strong> {{ workshop.duration }} min</p>
    <p><strong>Âge minimum :</strong> {{ workshop.age }} ans</p>
    <p class="mt-3">{{ workshop.description }}</p>

    <h4 class="mt-5">Sessions disponibles</h4>
    <ul v-if="workshop.workshopSessions?.length" class="list-group">
      <li
        v-for="session in workshop.workshopSessions"
        :key="session.id"
        class="list-group-item d-flex justify-content-between align-items-center"
      >
        {{ formatDate(session.date) }} - N°{{ session.session_number }}
        <button
          class="btn btn-success btn-sm"
          :disabled="workshopStore.loading"
          @click="handleBooking(session.id)"
        >
          <span v-if="workshopStore.loading" class="spinner-border spinner-border-sm"></span>
          <span v-else>Réserver</span>
        </button>
      </li>
    </ul>
    <p v-else>Aucune session prévue pour le moment.</p>
  </div>

  <!-- ✅ Toast réutilisable -->
  <AppToast v-model="toastMessage" :type="toastType" />
</template>

<style scoped>
.card {
  border-radius: 12px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}
</style>
