import Vue from "vue";
import VueRouter from "vue-router";
import device from "swiper/src/modules/device/device";
import progressBar from "../utils/nprogress";

Vue.use(VueRouter);

const Home = () => import("../views/Home");
const Legal = () => import("../views/Legal");

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      name: "Home",
      path: "/",
      component: Home
    },
    {
      name: "Legal",
      path: "/legals",
      component: Legal
    },
    {
      path: "*",
      redirect: "/"
    }
  ]
});

router.beforeEach(function(to, from, next) {
  setTimeout(() => {
    if (to.hash) {
      const position = document.querySelector(to.hash);

      if (position) {
        window.scrollTo({
          top: device.proto.device.desktop
            ? position.offsetTop - 50
            : position.offsetTop,
          behavior: "smooth"
        });
      }
    }
  }, 100);
  next();
});

router.beforeResolve((to, from, next) => {
  if (to.name) {
    progressBar.start();
  }
  next();
});

router.afterEach(() => {
  progressBar.stop();
});

export default router;
