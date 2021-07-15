<template>
  <section id="rooms" class="rooms">
    <div class="row">
      <div class="col-md-12 offset-lg-1 col-lg-5">
        <h1 class="page-title">
          {{ $t("page.rooms.list.title") }} ({{ count }})
        </h1>
      </div>
    </div>

    <div class="room-block">
      <div v-if="isLoading && !hasRooms" class="row offset-lg-1 col-lg-3 p-0">
        <p>Loading...</p>
      </div>
      <div v-else-if="!hasRooms" class="row offset-lg-1 col-lg-3 p-0">
        <p>No rooms</p>
      </div>
      <div class="row room" v-else v-for="room in rooms" :key="room.id">
        <div class="col-lg-4 p-0">
          <carousel>
            <carousel-slide v-for="image in room.images" :key="image">
              <img :src="image" alt="room-image" />
            </carousel-slide>
          </carousel>
        </div>
        <div class="col-md-12 col-lg-6">
          <div class="room-summary">
            <h3>{{ room.title }}</h3>

            <div class="row m-0">
              <div class="col-md-12 col-lg-6 p-0">
                <h4>{{ $t("page.rooms.spec") }}</h4>

                <div class="room-size">
                  {{ room.size }}
                </div>
                <div class="room-description">
                  {{ room.description }}
                </div>
              </div>
              <div class="col-md-12 offset-lg-1 col-lg-5 p-0">
                <h4>{{ $t("page.rooms.equipment") }}</h4>

                <div class="room-equipment">
                  <label v-for="equipment in room.equipment" :key="equipment">
                    {{ $t("page.rooms.equipments." + equipment) }}
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-2 p-0">
          <h3 class="room-price">
            {{ room.price }}€/{{ $t("page.rooms.night") }}
          </h3>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Carousel from "./carousel/Carousel.vue";
import CarouselSlide from "./carousel/CarouselSlide.vue";

export default {
  name: "Rooms",
  components: {
    Carousel,
    CarouselSlide
  },
  computed: {
    isLoading() {
      return this.$store.getters["room/isLoading"];
    },
    count() {
      return this.$store.getters["room/count"];
    },
    hasRooms() {
      return this.$store.getters["room/hasRooms"];
    },
    rooms() {
      return this.$store.getters["room/rooms"];
    }
  },
  created() {
    if (!this.hasRooms) {
      this.$store.dispatch("room/FETCHING_ROOMS");
    }
  }
};
</script>
