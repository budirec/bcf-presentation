import Vue from 'vue';
import Vuex from 'vuex';
import createLogger from 'vuex/dist/logger';

import slides from './modules/slides';

Vue.use(Vuex)

const debug: boolean = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
  modules: {
    slides
  },
  strict: debug,
  plugins: debug ? [createLogger({})] : [],
});
