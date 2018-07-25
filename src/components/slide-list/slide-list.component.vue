<template>
  <section>
    <el-table :data="slides" height="200" style="width: 100%" v-if="slides && slides.length">
      <el-table-column prop="slideId" label="Slide ID"></el-table-column>
      <el-table-column prop="name" label="Name"></el-table-column>
      <el-table-column prop="createdAt" label="Created At"></el-table-column>
    </el-table>
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
export default class extends Vue {
  @Prop([Slide]) slides: Array<Slide> = [];

  private mounted() { }
}
</script>

<style lang="scss">
// 
</style>
