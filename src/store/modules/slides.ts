import { StoreOptions } from 'vuex';
import { Slide } from 'models/slide.model';

const initialSlides: Array<Slide> = [];
const state = {
  slides: initialSlides,
}

const getters = {
  slideList: ((state, getter, rootState) => {
    // 
  })
}

const actions = {
  // 
}

const mutations = {
  // 
}

const storeOptions: StoreOptions<any> = {
  state,
  getters,
  actions,
  mutations,
}

export default storeOptions;
