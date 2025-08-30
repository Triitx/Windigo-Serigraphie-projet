<script setup lang="ts">
import { onMounted } from 'vue';
import { useWorkshopStore } from '@/stores/Workshop';

const workshopStore = useWorkshopStore();

onMounted(() => {
  workshopStore.fetchWorkshops();
});

const formatDate = (dateStr: string) => {
  const d = new Date(dateStr);
  return d.toLocaleDateString('fr-FR', { weekday: 'short', day: '2-digit', month: 'short', year: 'numeric' });
};
</script>

<template>
  <div class="container my-5">
    <h2 class="mb-4 text-center">Nos Ateliers</h2>

    <div v-if="workshopStore.loading" class="text-center my-5">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Chargement...</span>
      </div>
    </div>

    <div v-else-if="workshopStore.error" class="alert alert-danger text-center">
      {{ workshopStore.error }}
    </div>

    <div v-else class="row g-4">
      <div v-for="workshop in workshopStore.workshops" :key="workshop.id" class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ workshop.name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ workshop.type }}</h6>
            <p class="card-text mb-1"><strong>Prix :</strong> {{ workshop.price }} €</p>
            <p class="card-text mb-2"><strong>Durée :</strong> {{ workshop.duration }} min</p>
            <p class="card-text mb-2"><strong>Âge minimum :</strong> {{ workshop.age }} ans</p>

            <!-- Sessions -->
            <div v-if="workshop.workshopSessions?.length" class="mt-auto">
              <h6>Sessions :</h6>
              <ul class="list-group list-group-flush">
                <li v-for="session in workshop.workshopSessions" :key="session.id"
                  class="list-group-item d-flex justify-content-between align-items-center">
                  {{ formatDate(session.date) }} - N°{{ session.session_number }}
                  <span class="badge bg-primary rounded-pill">{{ session.capacity }} places</span>
                </li>
              </ul>
            </div>

            <RouterLink class="btn btn-primary mt-3 w-100"
              :to="{ name: 'atelier-detail', params: { id: workshop.id } }">
              Voir détails & Réserver
            </RouterLink>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card {
  border-radius: 12px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
</style>