const fs = require("fs");

module.exports = {
  devServer: {
    https: {
      key: fs.readFileSync("../nginx/ssl/default.key"),
      cert: fs.readFileSync("../nginx/ssl/default.crt")
    },
    disableHostCheck: true
  },
  transpileDependencies: ["vuetify"],
  chainWebpack: config => {
    config.plugin("html").tap(args => {
      args[0].title = process.env.VUE_APP_NAME;
      return args;
    });
  }
};
