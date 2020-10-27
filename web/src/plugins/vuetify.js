import Vue from "vue";
import Vuetify from "vuetify/lib";

Vue.use(Vuetify);

export default new Vuetify({
  theme: {
    options: {
      customProperties: true
    },
    themes: {
      light: {
        primary: "#3273dc",
        secondary: "#3298dc",
        accent: "#9c27b0",
        error: "#f14668",
        warning: "#ffc107",
        info: "#03a9f4",
        success: "#48c774"
      }
    }
  },
  icons: {
    iconfont: "fa"
  }
});
