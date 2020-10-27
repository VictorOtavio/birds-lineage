/**
 * Code-splitting a nível de rota.
 * O webpack gera um trecho separado de código (ex.: home.[hash].js) para cada
 * rota, que só é carragado quando a mesma é visitada.
 *
 * @param {String} view Nome do componente
 * @param {String} folder Pasta do componente
 * @return {Function}
 */
const lazyLoad = (view, folder = "views") => () =>
  import(/* webpackChunkName: "[request]" */ `@/${folder}/${view}.vue`);

export default lazyLoad;
