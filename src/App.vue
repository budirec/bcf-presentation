<template>
  <section>
    <h1>App</h1>

    <div class="half">
      <h5>slideIndex: {{slideIndex}}</h5>
      <SlideList :slides="slideData"/>
    </div>
    <div class="half">
      <SlideDetail :slide="selectedSlide"/>
    </div>

  </section>
</template>

<script lang="ts">
import Vue from "vue";
import Component from "vue-class-component";
import { throttle } from "throttle-debounce";

import { keyCodes } from "./utils/constants";
import SlideList from "./components/slide-list/slide-list.component.vue";
import SlideDetail from "./components/slide-detail/slide-detail.component.vue";

const dumbData: any[] = [
  {
    // TODO: FINISH UP OBJECTS ARRAY
    // fetch requests from
    //   https://pacific-oasis-39245.herokuapp.com/slides/detail/20180711
    //   https://pacific-oasis-39245.herokuapp.com/slides
    // loop between scenes with the push of a button
    // make a new route for selected slide
    // fetch all slides eventually and store them on Vuex
  }
];

@Component({
  name: "bcf-app",
  components: {
    SlideList,
    SlideDetail
  }
})
export default class extends Vue {
  public slideIndex: number = 0;
  public slidesRange: { min: number; max: number };
  public selectedSlide: any = {};
  public slideData: Array<any> = [];
  private throttledKeyListener: Function;

  constructor() {
    super();
    this.throttledKeyListener = throttle(100, false, this.keyPressListener);
    this.slideData = [
      {
        id: Date.now(),
        date: new Date(),
        key: null,
        selected: true
      }
    ];
    this.slidesRange = {
      min: 0,
      max: this.slideData.length - 1
    };
    this.selectedSlide = this.slideData[this.slideIndex];
  }

  private mounted() {
    window.addEventListener("keydown", <any>this.throttledKeyListener);
  }

  private beforeDestroy() {
    window.removeEventListener("keydown", <any>this.throttledKeyListener);
  }

  private keyPressListener(e: KeyboardEvent) {
    if (this.slideData.length < 10) {
      this.slideData.push({
        date: new Date(),
        id: Date.now(),
        key: e.keyCode,
        selected: true
      });
    }

    if (
      this.slideIndex < this.slideData.length - 1 &&
      (e.keyCode === keyCodes.up || e.keyCode === keyCodes.right)
    ) {
      this.slideIndex++;
    } else if (
      this.slideIndex > this.slidesRange.min &&
      (e.keyCode === keyCodes.down || e.keyCode === keyCodes.left)
    ) {
      this.slideIndex--;
    }
    this.selectedSlide = this.slideData[this.slideIndex];
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

.half {
  display: inline-block;
  max-width: 50%;
  vertical-align: top;
}
</style>
