import Vue from "vue";
import VueRouter from "vue-router";
import lazyLoad from "./lazy-load";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    component: lazyLoad("Layout"),
    children: [
      {
        path: "/",
        name: "home",
        component: lazyLoad("Home")
      }
    ]
  }
];

Vue.router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default Vue.router;
