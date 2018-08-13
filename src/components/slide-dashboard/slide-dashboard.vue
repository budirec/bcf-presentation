<template>
  <div>
    <header>
      <h1>Slide Dashboard</h1>
    </header>

    <section v-if="slidesList && slidesList.length">
      <SlideList :slides="slidesList" />
    </section>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";
import { mapGetters } from "vuex";

import SlideList from "./../slide-list/slide-list.component.vue";

@Component({
  components: {
    SlideList
  },
  computed: {
    ...mapGetters({
      slidesList: "getSlides"
    })
  }
})
export default class extends Vue {
  mounted() {
    if (!this.$store.getters.getSlides.length) {
      this.$store.dispatch("fetchSlides");
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
