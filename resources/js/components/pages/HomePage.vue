<template>
  <div id="home-page">
    <posts-list />
  </div>
</template>

<script>
import PostsList from "../posts/PostsList.vue";
export default {
  name: "HomePage",
  components: { PostsList },
};
</script>

<style>
</style>