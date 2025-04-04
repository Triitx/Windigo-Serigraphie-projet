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
        <div class="about">
          <div class="col">
            <div class="row">
              <div class="banner-content-title h1">A propos</div>
            </div>
            <div class="row">
              <div class="col">
                <img class="card-img-top" src="@/assets/apropos.png" alt="Card image cap">
              </div>
              <div class="col">
                <div class="overflow-auto">
                  <p class="u-text-justify">Windigo est un petit atelier de sérigraphie artisanale basé au Mans
                    spécialisé dans l'impression sur supports textiles et papiers.

                    Windigo propose une collection de vêtements et sacs imprimés et d'articles de papeterie, disponibles
                    sur etsy.

                    Je suis également à votre disposition pour toute question concernant un besoin particulier :
                    windigo.serigraphie@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="banner-content-title h1">Boutique</div>
            </div>
            <div class="btq">
              <div class="col">
                <div class="row">
                  <div class="img-bqt"><img class="object-fit-cover border rounded" src="@/assets/produit1.png"
                      alt="Card image cap"></div>
                </div>
                <div class="row">description</div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="row">
                    <div class="img-bqt"><img class="object-fit-cover border rounded" src="@/assets/produit2.png"
                      alt="Card image cap"></div>
                  </div>
                </div>
                <div class="row">description</div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="img-bqt"><img class="object-fit-cover border rounded" src="@/assets/produit3.png"
                    alt="Card image cap"></div>
                </div>
                <div class="row">description</div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="img-bqt"><img class="object-fit-cover border rounded" src="@/assets/produit4.png"
                    alt="Card image cap"></div>
                </div>
                <div class="row">description</div>
              </div>
            </div>
          </div>
        </div>
        <div class="news">
          <div class="col">
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
      </div>

      <div class="row">
        <div class="col">
          <div class="row">
            <div class="banner-content-title h1">Ateliers</div>
          </div>
          <div class="row">
            <div class="row">
              <div class="col">
                <div class="row">
                  <div>
                    <img class="card-img-top" src="@/assets/atelier1.png" alt="Card image cap">
                  </div>
                  <div class="row">
                    Sérigraphiez votre T-shirt ou votre sac sur-mesure
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="row">
                  <img class="card-img-top" src="@/assets/atelier2.png" alt="Card image cap">
                </div>
                <div class="row">
                  Initiez vous à la sérigraphie sur papier
                </div>
              </div>
            </div>
            <div class="row">
              Avis
            </div>
          </div>
        </div>
        <div class="col">
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
  flex: 2;
}

.news {
  display: flex;
  flex-direction: column;
  flex: 1;
}

.btq {
  display: flex;
  flex-direction: row;
}
.img-btq {
  width: 100%;
  height: 100%;
}
</style>