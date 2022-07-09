import { createRouter, createWebHistory } from 'vue-router';
import navigationGuards from '../navigation-guards';
import { progressBar } from '../utils/ui';
import routes from './routes';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const routerPush = router.push;

const interceptRouterPush: typeof router.push = async (...[to, ...args]) => {
  const normalizedTo = typeof to === 'string' ? to : { ...router.currentRoute.value, ...to };
  return routerPush(normalizedTo, ...args);
};

router.push = interceptRouterPush;

router.beforeEach(progressBar.start);
navigationGuards.forEach(router.beforeEach);
router.afterEach(progressBar.stop);

export default router;
