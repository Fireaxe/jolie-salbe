<template>
  <layout-basic>
    <div class="container-fluid">
      <banner />
      <rooms />
      <fishing />
      <contact />
    </div>
  </layout-basic>
</template>

<script>
import LayoutBasic from "../layouts/LayoutBasic.vue";
import Banner from "../components/Banner.vue";
import Rooms from "../components/Rooms.vue";
import Fishing from "../components/Fishing.vue";
import Contact from "../components/Contact.vue";
import "../assets/sass/views/home.scss";

export default {
  name: "Home",
  components: {
    LayoutBasic,
    Banner,
    Rooms,
    Fishing,
    Contact
  }
};
</script>
