<template>
  <footer class="footer">
    <div class="container">
      <div class="content has-text-centered">
        <router-link :to="{ name: 'Legal' }" style="color: #fff;">
          Mentions Légales
        </router-link>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Foot"
};
</script>
