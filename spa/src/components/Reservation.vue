<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useWorkshopStore } from '@/stores/Workshop';
import type { Workshop, WorkshopSession } from '@/_models/Workshop';
import type { Reservation  } from '@/_models/Reservation';

const store = useWorkshopStore();
const selectedWorkshop = ref<Workshop | null>(null);

// Charge tous les ateliers et réservations de l'utilisateur
onMounted(async () => {
  await store.fetchWorkshops();
  await store.fetchMyBookings();
});

// Affiche les sessions disponibles pour un atelier
async function showSessions(workshop: Workshop) {
  selectedWorkshop.value = workshop;
  await store.fetchSessions(workshop.id);
}

// Réserver une session
async function bookSession(sessionId: number) {
  try {
    await store.reserveSession(sessionId);
    alert('Réservation confirmée !');
  } catch (err: any) {
    alert(err.message || 'Erreur lors de la réservation');
  }
}

// Annuler une réservation
async function cancelBooking(reservationId: number) {
  try {
    await store.cancelReservation(reservationId);
    alert('Réservation annulée !');
  } catch (err: any) {
    alert(err.message || 'Erreur lors de l\'annulation');
  }
}

// Vérifie si l'utilisateur a déjà réservé une session
function isBooked(sessionId: number) {
  return store.reservations.some(r => r.workshop_session_id === sessionId);
}
</script>

<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-4">Réservation d'ateliers</h2>

    <div v-for="workshop in store.workshops" :key="workshop.id" class="border p-3 mb-3">
      <h3 class="font-semibold">{{ workshop.name }} ({{ workshop.type }})</h3>
      <p>Prix : {{ workshop.price }}€ | Durée : {{ workshop.duration }} min | Âge : {{ workshop.age }} ans</p>
      <button class="mt-2 px-2 py-1 bg-blue-500 text-white rounded"
        @click="showSessions(workshop)">
        Voir les sessions disponibles
      </button>

      <div v-if="selectedWorkshop?.id === workshop.id" class="mt-3">
        <h4 class="font-semibold mb-2">Sessions disponibles :</h4>
        <ul>
          <li v-for="session in store.sessions" :key="session.id" class="mb-1">
            Date : {{ session.date }} | Places restantes : {{ session.available_slots }}
            <button 
              class="ml-2 px-2 py-1 rounded"
              :class="isBooked(session.id) ? 'bg-gray-400' : 'bg-green-500 text-white'"
              @click="!isBooked(session.id) ? bookSession(session.id) : cancelBooking(store.reservations.find(r => r.workshop_session_id === session.id)?.id!)">
              {{ isBooked(session.id) ? 'Annuler' : 'Réserver' }}
            </button>
          </li>
        </ul>
      </div>
    </div>

    <div v-if="store.loading" class="text-blue-600 mt-2">Chargement...</div>
    <div v-if="store.error" class="text-red-600 mt-2">{{ store.error }}</div>
  </div>
</template>
