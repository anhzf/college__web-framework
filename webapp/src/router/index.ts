import { createRouter, createWebHistory } from 'vue-router';
import navigationGuards from '../navigation-guards';
import { progressBar } from '../utils/ui';
import routes from './routes';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach(progressBar.start);
navigationGuards.forEach(router.beforeEach);
router.afterEach(progressBar.stop);

export default router;
