<template>
  <section>
    slide detail
    
    <div v-if="slide">
      <h1>Id = {{slide.id}}</h1>
      <p>Date = {{slide.id}}</p>
    </div>
  </section>
</template>


<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";

@Component({
  props: ["slide"]
})
export default class extends Vue {
  private mounted() {}
}
</script>

<style lang="scss">
</style>

