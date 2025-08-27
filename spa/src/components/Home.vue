<script setup lang="ts">


</script>

<template>

  <body>
    <div class="home-container">
      <div class="row">
        <div class="col-8">
          <div class="about">
            <div class="about-img">
              <img class="card-img-top" src="@/assets/apropos.png" alt="Card image cap">
            </div>
            <div class="about-txt">
              <div class="banner-content-title h1">Description</div>
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
          <div class="p-3 mb-2 bg-body-secondary" style="height: 100%;">
            <div class="banner-content-title h1">Nouveautés</div>
            <div class="list-news">
              <div class="news">
                <img class="img-fluid object-fit-cover border rounded" src="@/assets/nouveaute1.png"
                  alt="Card image cap">
                <p class="u-text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="news">
                <img class="img-fluid object-fit-cover border rounded" src="@/assets/nouveaute2.png"
                  alt="Card image cap">
                <p class="u-text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="news">
                <img class="img-fluid object-fit-cover border rounded" src="@/assets/nouveaute3.png"
                  alt="Card image cap">
                <p class="u-text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="banner-content-title h1">Ateliers</div>
          <div class="ateliers">
            <div class="atelier-info">
              <div class="card">
                <img src="@/assets/atelier1.png" class="card-img-top" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">TEXTILE</h5>
                  <p class="card-text">Sérigraphiez votre T-shirt ou votre sac sur-mesure.</p>
                  <a href="#" class="btn btn-primary">En savoir plus ...</a>
                </div>
              </div>
            </div>
            <div class="atelier-info">
              <div class="card">
                <img src="@/assets/atelier2.png" class="card-img-top" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">PAPIER</h5>
                  <p class="card-text">Initiez-vous à la sérigraphie sur papier.</p>
                  <a href="#" class="btn btn-primary">En savoir plus ...</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-6">
          <div class="banner-content-title h1">Port-Folio</div>
          <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="@/assets/carousel1.jpg" class="d-block w-100" alt="Card image cap">
              </div>
              <div class="carousel-item">
                <img src="@/assets/carousel2.jpg" class="d-block w-100" alt="Card image cap">
              </div>
              <div class="carousel-item">
                <img src="@/assets/carousel3.jpg" class="d-block w-100" alt="Card image cap">
              </div>
              <div class="carousel-item">
                <img src="@/assets/carousel4.jpg" class="d-block w-100" alt="Card image cap">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <div class="avis">
        <div class="card">
          <div class="card-body">
            <div class="rating">
              <input value="5" name="rate" id="star5" type="radio">
              <label title="text" for="star5"></label>
              <input value="4" name="rate" id="star4" type="radio">
              <label title="text" for="star4"></label>
              <input value="3" name="rate" id="star3" type="radio">
              <label title="text" for="star3"></label>
              <input value="2" name="rate" id="star2" type="radio">
              <label title="text" for="star2"></label>
              <input value="1" name="rate" id="star1" type="radio">
              <label title="text" for="star1"></label>
            </div>
            <h5 class="card-title">Topissime</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Sujet : Atelier</h6>
            <p class="card-text" style="">Découverte de la sérigraphie à travers cet atelier convivial et
              intimiste en
              petit groupe. Clément est très sympa, le temps passe vite, et on repart avec un très jolie T-shirt !
              Au
              plaisir de revenir !</p>
          </div>
        </div>
      </div>
      <div class="formualire">
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
  flex-direction: column;
  flex: 1;
}

.list-news {
  justify-content: space-between;
  height: 100%;
}

.news {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  height: 30%;
}

.news img {
  width: 10vw;
  height: 100% !important;
  margin-right: 1vw;
  flex: 1;
}

.news p {
  margin-bottom: 0 !important;
  flex: 1;
  font-size: 1vw;
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


.ateliers {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1vw;
}

.atelier-info {
  width: 100%;
}

.avis {
  margin-top: 1vw;
  margin-bottom: 1vw;
  grid-column: 1/-1;
}

.rating:not(:checked)>input {
  position: absolute;
  appearance: none;
}

.rating:not(:checked)>label {
  float: right;
  cursor: pointer;
  font-size: 30px;
  color: #666;
}

.rating:not(:checked)>label:before {
  content: '★';
}

.rating>input:checked+label:hover,
.rating>input:checked+label:hover~label,
.rating>input:checked~label:hover,
.rating>input:checked~label:hover~label,
.rating>label:hover~input:checked~label {
  color: #e58e09;
}

.rating:not(:checked)>label:hover,
.rating:not(:checked)>label:hover~label {
  color: #ff9e0b;
}

.rating>input:checked~label {
  color: #ffa723;
}
</style>