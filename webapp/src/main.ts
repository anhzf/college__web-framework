import { createApp } from 'vue';
import './polyfills';
import App from './App.vue';
import vuetify from './plugins/vuetify';
import { loadFonts } from './plugins/webfontloader';
import router from './router';

loadFonts();

const app = createApp(App)
  .use(vuetify)
  .use(router);

router.isReady().then(() => {
  app.mount('#app');
});
