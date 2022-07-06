import { NavigationGuard } from 'vue-router';
import { useAuthStore } from '../../stores/auth';
import routeGuardian from './routeGuardian';

const authNavigationGuard: NavigationGuard = async (to) => {
  const auth = useAuthStore();

  if (!auth.isReady) {
    return new Promise((resolve) => {
      const unsubscribe = auth.$subscribe((mutation, { isReady }) => {
        if (isReady) {
          unsubscribe();
          resolve(routeGuardian(to));
        }
      });
    });
  }

  return routeGuardian(to);
};

export default authNavigationGuard;