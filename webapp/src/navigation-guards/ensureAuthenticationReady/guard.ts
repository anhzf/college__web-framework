import { NavigationGuard } from 'vue-router';
import { useAuthStore } from '../../stores/auth';

export const ensureAuthenticationReady: NavigationGuard = () => {
  const auth = useAuthStore();

  if (auth.isReady) return true;

  return new Promise((resolve) => {
    const unsubscribe = auth.$subscribe((mutation, { isReady }) => {
      if (isReady) {
        unsubscribe();
        resolve(true);
      }
    });
  });
};
