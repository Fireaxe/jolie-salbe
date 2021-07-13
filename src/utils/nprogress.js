import NProgress from "vue-nprogress";

const nprogress = new NProgress();

export default {
  count: 0,
  progressTimeout: 0,
  start() {
    this.count++;

    this.progressTimeout = setTimeout(() => {
      nprogress.start();
    }, 200);
  },
  stop() {
    this.count = Math.max(0, this.count - 1);
    if (this.count > 0) return;

    nprogress.done();
    clearTimeout(this.progressTimeout);
  }
};
