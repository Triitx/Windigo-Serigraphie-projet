<script setup lang="ts">
import WelcomeItem from './WelcomeItem.vue'
import DocumentationIcon from './icons/IconDocumentation.vue'
import ToolingIcon from './icons/IconTooling.vue'
import EcosystemIcon from './icons/IconEcosystem.vue'
import CommunityIcon from './icons/IconCommunity.vue'
import SupportIcon from './icons/IconSupport.vue'

const openReadmeInEditor = () => fetch('/__open-in-editor?file=README.md')
</script>

<template>

  <body>
    <div class="home-container">

      <div class="row">
        <div class="col-8">
          <div class="row">
            <div class="banner-content-title h1">A propos</div>
          </div>
          <div class="about">
            <div class="about-img">
              <img class="card-img-top" src="@/assets/apropos.png" alt="Card image cap">
            </div>
            <div class="about-txt">
              <p class="u-text-justify">Windigo est un petit atelier de sérigraphie artisanale basé au Mans
                spécialisé dans l'impression sur supports textiles et papiers.

                Windigo propose une collection de vêtements et sacs imprimés et d'articles de papeterie, disponibles
                sur etsy.

                Je suis également à votre disposition pour toute question concernant un besoin particulier :
                windigo.serigraphie@gmail.com</p>
            </div>
          </div>

          <div class="banner-content-title h1">Boutique</div>

          <div class="liste-produit">
            <div class="produit">
              <div class="card text-center mb-3" style="width: 100%;">
                <div class="card-body">
                  <img src="@/assets/produit1.png" class="img-fluid object-fit-cover border rounded"
                    alt="Card image cap">
                  <h6 class="card-title">Illustration sérigraphiée - Van life</h6>
                  <span class="card-text">40,00€</span>
                </div>
              </div>
            </div>
            <div class="produit">
              <div class="card text-center mb-3" style="width: 100%;">
                <div class="card-body">
                  <img src="@/assets/produit2.png" class="img-fluid object-fit-cover border rounded"
                    alt="Card image cap">
                  <h6 class="card-title">Illustration sérigraphiée - Fortune teller</h6>
                  <span class="card-text">30,00€</span>
                </div>
              </div>
            </div>
            <div class="produit">
              <div class="card text-center mb-3" style="width: 100%;">
                <div class="card-body">
                  <img src="@/assets/produit3.png" class="img-fluid object-fit-cover border rounded"
                    alt="Card image cap">
                  <h6 class="card-title">T-shirt manches longues - Unleash the beast</h6>
                  <span class="card-text">27,00€</span>
                </div>
              </div>
            </div>
            <div class="produit">
              <div class="card text-center mb-3" style="width: 100%;">
                <div class="card-body">
                  <img src="@/assets/produit4.png" class="img-fluid object-fit-cover border rounded"
                    alt="Card image cap">
                  <h6 class="card-title">T-shirt unisexe - Nocturnal</h6>
                  <span class="card-text">32,00€</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="p-3 mb-2 bg-body-secondary">
            <div class="row">
              <div class="banner-content-title h1">Nouveautés</div>
            </div>
            <div class="row">
              <div class="col"><img class="card-img-top" src="@/assets/nouveaute1.png" alt="Card image cap"></div>
              <div class="col">
                <p class="u-text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
            <div class="row">
              <div class="col"><img class="card-img-top" src="@/assets/nouveaute2.png" alt="Card image cap"></div>
              <div class="col">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
            <div class="row">
              <div class="col"><img class="card-img-top" src="@/assets/nouveaute3.png" alt="Card image cap"></div>
              <div class="col">
                <p class="u-text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="banner-content-title h1">Ateliers</div>
          </div>
          <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="card" style="width: 18rem;">
                <img src="@/assets/atelier1.png" class="card-img-top" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">TEXTILE</h5>
                  <p class="card-text">Sérigraphiez votre T-shirt ou votre sac sur-mesure.</p>
                  <a href="#" class="btn btn-primary">En savoir plus ...</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card" style="width: 18rem;">
                <img src="@/assets/atelier2.png" class="card-img-top" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">PAPIER</h5>
                  <p class="card-text">Initiez vous à la sérigraphie sur papier.</p>
                  <a href="#" class="btn btn-primary">En savoir plus ...</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            Avis
          </div>
        </div>
        <div class="col-6">
          <div class="row">
            <div class="banner-content-title h1">Port-Folio</div>
          </div>
          <div class="row">
            <div class="col"> Photo
            </div>
            <div class="col"> Photo
            </div>
            <div class="col"> Photo
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        Prendre contact
      </div>

    </div>
  </body>
</template>

<style scoped>
.home-container {
  width: 90%;
  margin: 5%
}

.about {
  display: flex;
  flex-direction: row;
  gap: 5%;
}

.about-img {
  display: flex;
  flex: 1;
}

.about-txt {
  display: flex;
  flex: 1;
}

.news {
  display: flex;
  flex-direction: column;
  flex: 1;
}

.liste-produit {
  display: flex;
  flex-direction: row;
  gap: 1vw;
}

.produit {
  width: 100%;
  height: auto;
}

.produit img {
  width: 100%;
  height: 15vw !important;
}

.produit h6 {
  height: 5vw;
}

.atelier-list {
  display: flex;
  flex-direction: row;
}
</style>