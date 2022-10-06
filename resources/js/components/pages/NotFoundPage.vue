<template>
  <div
    id="not-found-page"
    class="d-flex flex-column justify-content-center align-items-center"
  >
    <div class="py-2">
      <h3 class="text-center">404 | Page not found</h3>
    </div>
    <div>
      <button type="button" @click="$router.back()" class="btn btn-secondary">
        Torna indietro
      </button>
    </div>
  </div>
</template>

<script>
import AboutPage from "./AboutPage.vue";
export default {
  components: { AboutPage },
  name: "NotFoundPage",
};
</script>

<style scoped >
#not-found-page {
  height: 90vh;
}
</style>