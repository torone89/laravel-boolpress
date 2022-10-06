
<template>
  <div class="content">
    <the-header :title="title" />
    <main class="container my-3">
      <router-view></router-view>
    </main>
  </div>
</template>

<script>
import TheHeader from "./TheHeader.vue";

export default {
  name: "App",
  components: { TheHeader },
  name: "App",
  data() {
    return {
      title: "BoolPress",
    };
  },
};
</script>
  
