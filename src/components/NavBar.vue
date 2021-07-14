<template>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <router-link to="#banner" class="navbar-brand">
      {{ $t("app.title") }}
    </router-link>
    <button v-on:click="toggle" class="navbar-toggler" type="button">
      <span class="navbar-toggler-icon" />
    </button>
    <div ref="menu" class="collapse navbar-collapse">
      <div class="navbar-nav">
        <router-link to="#description" class="nav-item nav-link">
          {{ $t("page.homepage.title") }}
        </router-link>
        <router-link to="#rooms" class="nav-item nav-link">
          {{ $t("page.rooms.title") }}
        </router-link>
        <router-link to="#fishing" class="nav-item nav-link">
          {{ $t("page.fishing.title") }}
        </router-link>
        <router-link to="#contact" class="nav-item nav-link">
          {{ $t("page.contact.title") }}
        </router-link>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  methods: {
    toggle() {
      const target = this.$refs.menu;

      if (!target.classList.contains("show")) {
        target.classList.add("show");
      } else {
        target.classList.remove("show");
      }
    }
  }
};
</script>
