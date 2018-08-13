<template>
  <section v-if="Object.keys(slide).length">
    <div>
      <h1>Name = {{slide.name}}</h1>
    </div>

  </section>
</template>


<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";
import { Prop } from "vue-property-decorator";

import { getSlideDetail } from "../../services";
import { Slide } from "../../models/slide.model";

@Component({
  props: ["slide"]
})
export default class extends Vue {
  // @Prop(Slide) slide: Slide;

  private mounted() {
    // if (this.slide && this.slide.slideId === 1) {
    //   getSlideDetail(this.slide.name).then(slideDetail => {
    //     console.log({ slideDetail });
    //   });
    // }
  }
}
</script>

<style lang="scss">
</style>

