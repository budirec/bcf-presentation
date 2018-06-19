<template>
  <section>
    <h1>
    {{name}}
    </h1>
  </section>
</template>

<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";

@Component({
  name: "bcf-app"
})
export default class extends Vue {
  private nameHolder: string = "Vue App with HMR";

  public get name(): string {
    return this.nameHolder;
  }
}
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
