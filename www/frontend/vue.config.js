const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true
  // css: {
  //   loaderOptions: {   // так
  //   additionalData: {  // или так
  //     sass: {
  //       prependData: ' @import "@/assets/_variables.scss"; // автоматически подключается во все файлы
  //     }
  //   }
  // }
})
