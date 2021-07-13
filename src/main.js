import Vue from "vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import VueI18n from "vue-i18n";
import VueTimeago from "vue-timeago";
import App from "./App.vue";
import router from "./router";
import messages from "./assets/lang";
import axios from "axios";
import VueAxios from "vue-axios";
import store from "./store";
import NProgress from "vue-nprogress";

import "../node_modules/nprogress/nprogress.css";

Vue.config.productionTip = false;

const options = {
  latencyThreshold: 200
};

Vue.use(NProgress, options);
Vue.use(VueAxios, axios);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueI18n);

Vue.use(VueTimeago, {
  locale: "fr"
});

const i18n = new VueI18n({
  fallbackLocale: "fr",
  locale: "fr",
  messages
});

new Vue({
  router,
  i18n,
  store,
  render: h => h(App)
}).$mount("#app");
