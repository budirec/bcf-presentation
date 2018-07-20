import Vue from 'vue';
import VueRouter, { RouteConfig } from "vue-router";

import SlideDashboard from './components/slide-dashboard/slide-dashboard.vue';

const routes: RouteConfig[] = [
  {
    path: '/',
    name: 'slide-dashboard',
    component: SlideDashboard,
  }
];

Vue.use(VueRouter);


export default new VueRouter({
  routes,
  mode: 'history',
});
