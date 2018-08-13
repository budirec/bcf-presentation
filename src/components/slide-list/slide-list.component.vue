<template>
  <section>
    <ul>
      <li 
        v-for="(slide) in slides" 
        v-bind:key="slide.slideId">
          <p>created @: {{slide.createdAt}}</p>
          <p>name: {{slide.name}}</p>
      </li>
    </ul>
  </section>
</template>

<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";
import { Prop } from "vue-property-decorator";

import { getAllSlides } from "./../../services";
import { Slide } from "../../models/slide.model";
// TODO: Clean up this component
// make a slide item component that will be the featured slide
// <!-- v-if="item.selected || index === slideOrder" -->
// show/hide slides via display:none class..
// not by taking them out entirely from the template

@Component({
  props: ["slides"]
})
export default class extends Vue {}
</script>

<style lang="scss">
//
</style>
