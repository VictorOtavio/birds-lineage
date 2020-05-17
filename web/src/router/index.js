import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

/**
 * Lazy load view.
 * @param {String} n View name
 */
function loadView(n) {
  return import(/* webpackChunkName: "[request]" */ `@/views/${n}.vue`);
}

const routes = [
  {
    path: "/",
    name: "Home",
    component: () => loadView("Home")
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
