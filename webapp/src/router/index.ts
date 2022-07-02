import { createRouter, createWebHistory } from 'vue-router';
import navigationGuards from '../navigation-guards';
import routes from './routes';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

navigationGuards.forEach((guard) => router.beforeEach(guard));

export default router;
