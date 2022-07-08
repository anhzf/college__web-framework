import { createApp } from 'vue';
import './polyfills';
import App from './App.vue';
import vuetify from './plugins/vuetify';
import { loadFonts } from './plugins/webfontloader';
import 'tailwindcss/utilities.css';
import router from './router';
import pinia from './stores';
import './utils/hijack-ajax';
import __ from './lang';

loadFonts();

const app = createApp(App)
  .use(vuetify)
  .use(router)
  .use(pinia)
  .use((ctx) => {
    ctx.config.globalProperties.__ = __;
  });

router.isReady().then(() => {
  app.mount('#app');
});
