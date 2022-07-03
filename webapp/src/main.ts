import { createApp } from 'vue';
import './polyfills';
import App from './App.vue';
import vuetify from './plugins/vuetify';
import { loadFonts } from './plugins/webfontloader';
import 'tailwindcss/utilities.css';
import router from './router';
import pinia from './stores';
import './utils/hijack-ajax';

loadFonts();

const app = createApp(App)
  .use(vuetify)
  .use(router)
  .use(pinia);

router.isReady().then(() => {
  app.mount('#app');
});
