<template>
  <section>
    <h1>App</h1>

    <div>
      <h5>slideOrder: {{slideOrder}}</h5>
      <SlidesList :slides="slidesHolder"/>
    </div>
  </section>
</template>

<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";
import { throttle } from "throttle-debounce";

import { keyCodes } from "./utils/constants";
import SlidesList from "./components/slides-list/slides-list.component.vue";

const dumbData: any[] = [
  {
    // TODO: FINISH UP OBJECTS ARRAY
    // fetch requests from 
    //   https://pacific-oasis-39245.herokuapp.com/slides/detail/20180711
    //   https://pacific-oasis-39245.herokuapp.com/slides
    // prevent slideorder from exceeding array limits
    // loop between scenes with the push of a button
    // set selected slide
    // make a new route for selected slide
    // fetch all slides eventually and store them on Vuex
  }
];

@Component({
  name: "bcf-app",
  components: {
    SlidesList
  }
})
export default class extends Vue {
  public slideOrder = 0;
  private throttledKeyListener: Function;
  private slidesHolder: Array<any> = [
    {
      id: Date.now(),
      date: new Date(),
      key: null,
      selected: true
    }
  ];

  constructor() {
    super();
    this.throttledKeyListener = throttle(100, false, this.keyPressListener);
  }

  private mounted() {
    window.addEventListener("keydown", <any>this.throttledKeyListener);
  }

  private beforeDestroy() {
    window.removeEventListener("keydown", <any>this.throttledKeyListener);
  }

  private keyPressListener(e: KeyboardEvent) {
    // if (this.slidesHolder.length < 10) {
    //   this.slidesHolder.map(i => (i.selected = false));
    // }
    e.preventDefault();

    if (this.slidesHolder.length < 10) {
      this.slidesHolder.unshift({
        date: new Date(),
        id: Date.now(),
        key: e.keyCode,
        selected: true
      });
    }
    if (this.slideOrder >= 0 && this.slideOrder < 10) {
      switch (e.keyCode) {
        case keyCodes.up:
          this.slideOrder++;
          break;
        case keyCodes.right:
          this.slideOrder++;
          break;
        case keyCodes.down:
          this.slideOrder--;
          break;
        case keyCodes.left:
          this.slideOrder--;
          break;
        default:
          break;
      }
    }
  }
}
</script>

<style lang="scss">
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
