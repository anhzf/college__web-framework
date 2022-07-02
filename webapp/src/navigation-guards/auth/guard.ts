import { NavigationGuard, RouteLocationRaw } from 'vue-router';
import UnathenticatedError from '../../errors/UnauthenticatedError';
import router from '../../router';
import { useAuthStore } from '../../stores/auth';
import { errorAsNotification } from '../../utils/ui';
import {
  FAIL_FALLBACK_ROUTE, GuardName, Role, Severity,
} from './constants';

const parseGuard = (name: GuardName) => {
  const [role, severity] = name.split(':');
  return { role, severity } as ({role: Role, severity: Severity});
};

const authNavigationGuard: NavigationGuard = async (to, from, next) => {
  if (to.meta.guard) {
    const {
      user, isAdmin, isMember, refresh,
    } = useAuthStore();
    const { role, severity } = parseGuard(to.meta.guard);

    if (severity === 'strict') {
      await refresh();
    }

    if (role === 'admin' && !isAdmin) {
      if (user) next(false);
      else next(FAIL_FALLBACK_ROUTE.ADMIN);
    }

    if (role === 'member' && !isMember) {
      errorAsNotification(new UnathenticatedError());
      next(FAIL_FALLBACK_ROUTE.MEMBER);
    }

    if (role === 'guest' && user) {
      next(FAIL_FALLBACK_ROUTE.GUEST);
    }
  }

  next();
};

export default authNavigationGuard;
