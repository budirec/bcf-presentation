import { StoreOptions, Commit } from 'vuex';

import { Slide } from './../../models/slide.model';
import { SET_SLIDES } from './mutationTypes';
import { getAllSlides } from './../../services';

const state: SlideStateI = {
  slides: [],
}

const getters = {
  getSlides: ((state: SlideStateI) => state.slides),
}

const actions = {
  fetchSlides({ state, commit }: SlideActionOptionsI) {
    getAllSlides()
      .then(data => {
        let slides = Array.prototype.map.call(
          data,
          (slide: any) => new Slide(slide)
        );
        commit(SET_SLIDES, slides)
      })
      .catch(err => console.error({ err }));
  }
}

const mutations = {
  [SET_SLIDES](state: SlideStateI, slides: Array<Slide>) {
    state.slides = slides;
  }
}

const storeOptions: StoreOptions<any> = {
  state,
  getters,
  actions,
  mutations,
}

export default storeOptions;

interface SlideStateI {
  slides: Array<Slide>;
}

interface SlideActionOptionsI {
  state: SlideStateI;
  commit: Commit;
}
