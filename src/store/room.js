import RoomAPI from "../api/room";
import Vue from "vue";

const FETCHING_ROOMS = "FETCHING_ROOMS",
  FETCHING_ROOM = "FETCHING_ROOM",
  FETCHING_ROOMS_SUCCESS = "FETCHING_ROOMS_SUCCESS",
  FETCHING_ROOM_SUCCESS = "FETCHING_ROOM_SUCCESS",
  FETCHING_ROOMS_ERROR = "FETCHING_ROOMS_ERROR";

export default {
  namespaced: true,
  state: {
    isLoading: false,
    error: null,
    rooms: {}
  },
  getters: {
    isLoading(state) {
      return state.isLoading;
    },
    error(state) {
      return state.error;
    },
    hasRooms(state) {
      return Object.keys(state.rooms).length > 0;
    },
    rooms(state) {
      return state.rooms;
    },
    count(state) {
      return Object.keys(state.rooms).length;
    }
  },
  mutations: {
    [FETCHING_ROOMS](state) {
      state.isLoading = true;
      state.error = null;
      state.rooms = {};
    },
    [FETCHING_ROOM](state) {
      state.isLoading = true;
      state.error = null;
    },
    [FETCHING_ROOMS_SUCCESS](state, rooms) {
      state.rooms = {};
      state.isLoading = false;
      state.error = null;

      rooms.data.forEach(room => {
        Vue.set(state.rooms, room.id, {
          id: room.id,
          open: room.attributes.field_open,
          title: room.attributes.title,
          size: room.attributes.field_size,
          price: room.attributes.field_price,
          description: room.attributes.field_description,
          equipment: room.attributes.field_equipment
        });

        this.dispatch("room/FETCHING_ROOM", room.id);
      });
    },
    [FETCHING_ROOM_SUCCESS](state, room) {
      state.isLoading = false;
      state.error = null;

      Vue.set(state.rooms, room.data.id, {
        id: room.data.id,
        open: room.data.attributes.field_open,
        title: room.data.attributes.title,
        size: room.data.attributes.field_size,
        price: room.data.attributes.field_price,
        description: room.data.attributes.field_description,
        equipment: room.data.attributes.field_equipment,
        images: room.included.map(el => {
          let image = null;
          el.attributes.image_style_uri.forEach(el => {
            if (el["large"] !== undefined) {
              image = el["large"];
            }
          });
          return image;
        })
      });
    },
    [FETCHING_ROOMS_ERROR](state, error) {
      state.isLoading = false;
      state.error = error;
    }
  },
  actions: {
    [FETCHING_ROOMS]: async ({ commit }) => {
      commit(FETCHING_ROOMS);
      try {
        let response = await RoomAPI.findAll();
        commit(FETCHING_ROOMS_SUCCESS, response.data);
        return response.data;
      } catch (error) {
        commit(FETCHING_ROOMS_ERROR, error);
        return null;
      }
    },
    [FETCHING_ROOM]: async ({ commit }, id) => {
      commit(FETCHING_ROOM);
      try {
        let response = await RoomAPI.findOne(id);
        commit(FETCHING_ROOM_SUCCESS, response.data);
        return response.data;
      } catch (error) {
        commit(FETCHING_ROOMS_ERROR, error);
        return null;
      }
    }
  }
};
