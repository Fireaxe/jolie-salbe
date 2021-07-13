import CarouselAPI from "../api/carousel";
import Vue from "vue";

const FETCHING_CAROUSEL = "FETCHING_CAROUSEL",
  FETCHING_CAROUSEL_SUCCESS = "FETCHING_CAROUSEL_SUCCESS",
  FETCHING_CAROUSEL_ERROR = "FETCHING_CAROUSEL_ERROR";

export default {
  namespaced: true,
  state: {
    isLoading: false,
    error: null,
    carousels: {}
  },
  getters: {
    isLoading(state) {
      return state.isLoading;
    },
    error(state) {
      return state.error;
    },
    hasCarousels(state) {
      return Object.keys(state.carousels).length > 0;
    },
    carousels(state) {
      return state.carousels;
    },
    count(state) {
      return Object.keys(state.carousels).length;
    }
  },
  mutations: {
    [FETCHING_CAROUSEL](state) {
      state.isLoading = true;
      state.error = null;
      state.carousels = {};
    },
    [FETCHING_CAROUSEL_SUCCESS](state, carousel) {
      state.isLoading = false;
      state.error = null;

      Vue.set(state.carousels, carousel.data.id, {
        title: carousel.data.attributes.title,
        images: carousel.included.map(el => {
          let image = null;
          el.attributes.image_style_uri.forEach(el => {
            if (el["homepage"] !== undefined) {
              image = el["homepage"];
            }
          });
          return image;
        })
      });
    },
    [FETCHING_CAROUSEL_ERROR](state, error) {
      state.isLoading = false;
      state.error = error;
    }
  },
  actions: {
    homepage: async ({ commit }) => {
      commit(FETCHING_CAROUSEL);
      // try {
      let response = await CarouselAPI.findHomepage();
      commit(FETCHING_CAROUSEL_SUCCESS, response.data);
      return response.data;
      // } catch (error) {
      //   commit(FETCHING_CAROUSEL_ERROR, error);
      //   return null;
      // }
    }
  }
};
