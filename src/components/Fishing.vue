<template>
  <section id="fishing" class="fishing">
    <div class="row">
      <div class="col-md-12 offset-lg-1 col-lg-5">
        <h1 class="page-title large">
          {{ $t("page.fishing.page") }}
        </h1>
      </div>
    </div>

    <div class="row fishing-block">
      <div class="col-md-12 col-lg-6">
        <ul>
          <li>{{ $t("page.fishing.description.text") }}</li>
          <li>{{ $t("page.fishing.description.text2") }}</li>
          <li>{{ $t("page.fishing.description.text3") }}</li>
        </ul>
      </div>
      <div class="col-md-12 col-lg-5">
        <carousel>
          <carousel-slide>
            <img
              width="100%"
              height="100%"
              src="../assets/images/etang.png"
              alt="etang-image"
            />
          </carousel-slide>
          <carousel-slide>
            <img
              width="100%"
              height="100%"
              src="../assets/images/animaux.jpg"
              alt="animaux-image"
            />
          </carousel-slide>
          <carousel-slide>
            <img
              width="100%"
              height="100%"
              src="../assets/images/chèvre.jpg"
              alt="chèvre-image"
            />
          </carousel-slide>
          <carousel-slide>
            <img
              width="100%"
              height="100%"
              src="../assets/images/mouton.jpg"
              alt="mouton-image"
            />
          </carousel-slide>
        </carousel>
      </div>
    </div>
  </section>
</template>

<script>
import Carousel from "./carousel/Carousel.vue";
import CarouselSlide from "./carousel/CarouselSlide.vue";

export default {
  name: "Fishing",
  components: {
    Carousel,
    CarouselSlide
  }
};
</script>

<style scoped lang="scss">
.fishing-block {
  height: 350px;
  align-items: center;

  .swiper-container {
    display: flex;
    align-items: center;
    height: 350px;

    img {
      object-fit: cover;
    }
  }
}
</style>
