window._ = require("lodash");
window.$ = require("umbrellajs");
window.Bulma = require("@vizuaalog/bulmajs").default;
window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Fade out effect on an HTML element.
 */
window.fadeOut = function (el, duration, callback) {
  var fadeEffect = setInterval(function () {
    if (!el.style.opacity) {
      el.style.opacity = 1;
    }

    if (el.style.opacity > 0) {
      el.style.opacity -= 0.1;
    } else {
      el.style.display = "none";
      callback();
      clearInterval(fadeEffect);
    }
  }, duration / 10);
};
