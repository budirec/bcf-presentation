<template>
  <section>
    <div v-if="slide">
      <h1>Name = {{slide.name}}</h1>
    </div>

  </section>
</template>


<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";
import { getSlideDetail } from "../../services";
import { Slide } from "../../models/slide.model";

@Component({
  props: ["slide"]
})
export default class extends Vue {
  public slide: Slide;

  private mounted() {
    if (this.slide.slideId === 1) {
      getSlideDetail(this.slide.name).then(slideDetail => {
        console.log({ slideDetail });
      });
    }
  }
}
</script>

<style lang="scss">
</style>

