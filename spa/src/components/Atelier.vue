<script setup lang="ts">

</script>

<template>

  <body>
    <div class="atelier-container">
      <div class="atelier">
        <div class="atelier-info">
          <div class="card">
            <h5 class="card-header text-center">TEXTILE</h5>
            <img src="@/assets/atelier1.png" class="card-img-top" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Durant cet atelier vous réaliserez une impression en une couleur sur un support
                textile, tote-bag ou t-shirt au choix, qui vous sera fourni, vous pourrez apporter votre propre support
                textile si vous le désirez.
                Vous choisirez d’abord votre motif à imprimer parmi une sélection de visuels.
                La seconde étape consistera à préparer et caler votre motif sur la presse.
                L’étape suivante sera celle de la préparation de votre couleur, vous pourrez choisir parmi des couleurs
                primaires ou faire votre propre mélange.
                Arrive enfin l’étape cruciale de l’impression où vous réaliserez votre première sérigraphie textile.
                Vous repartirez avec votre t-shirt ou tote-bag imprimé par vos soins !</p>
              <div class="d-grid gap-2 col-8 mx-auto">
                <a href="#" class="btn btn-primary">Reserver une place pour cet atelier</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="atelier">
        <div class="atelier-info">
          <div class="card">
            <h5 class="card-header text-center">PAPIER</h5>
            <img src="@/assets/atelier2.png" class="card-img-top" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">Durant cet atelier, vous réaliserez une impression en deux couleurs
                  sur un support papier.Vous aurez le choix entre imprimer une affiche A3 ou une série de cartes. Vous
                  choisirez d’abord votre motif à imprimer parmi une sélection de visuels.La seconde étape sera celle de
                  la préparation de vos couleurs, vous pourrez choisir parmi des couleurs primaires ou créer vos propres
                  couleurs.L’étape suivante consistera à préparer et caler la première couleur de votre motif sur la
                  presse.Arrive ensuite l’étape cruciale de l’impression où vous réaliserez votre première sérigraphie
                  papier.Vous répéterez le processus de calage puis imprimerez votre seconde couleur pour finaliser
                  votre sérigraphie papier.Vous repartirez avec votre affiche A3 ou vos cartes imprimées par vos soins
                  !</p>
              <div class="d-grid gap-2 col-8 mx-auto">
                <a href="#" class="btn btn-primary">Reserver une place pour cet atelier</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="formulaire">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Demande</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>
    </div>
  </body>
</template>

<style scoped>
.atelier-container {
  display: grid;
  grid-template-columns: 2fr 2fr 1fr;
  gap: 1vw;
  margin: 1vw;
}
</style>