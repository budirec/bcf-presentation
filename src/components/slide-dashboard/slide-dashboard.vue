<template>
  <div>
    <header>
      <h1>Slide Dashboard</h1>
    </header>

    <section>
      <SlideList :slides="slides" />
    </section>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";

import SlideList from "./../slide-list/slide-list.component.vue";
import { Slide } from "./../../models/slide.model";
import { getAllSlides } from "./../../services";

@Component({
  components: {
    SlideList
  }
})
export default class extends Vue {
  public slides: Array<Slide> = [];
  constructor() {
    super();
  }

  private mounted() {
    this.getSlides();
  }

  private getSlides() {
    getAllSlides()
      .then(data => {
        this.slides = Array.prototype.map.call(
          data,
          (slide: any) => new Slide(slide)
        );
      })
      .catch(err => console.error({ err }));
  }
}
</script>

<style lang="scss" scoped>
//
</style>


