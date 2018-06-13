<template>
  <section>
    <h1>
    {{name}}
    </h1>
  </section>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  name: "bcf-app",
  data() {
    return {
      name: "Vue App with HMR"
    };
  },
});
</script>

<style <style lang="scss">
html,
body {
  box-sizing: border-box;
  display: flex;
  flex: 1;
  flex-direction: column;
  height: 100vh;
  margin: 0;
  width: 100vw;
}
</style>
