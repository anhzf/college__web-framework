import { NavigationGuard } from 'vue-router';
import UnathenticatedError from '../../errors/UnauthenticatedError';
import UnathorizedError from '../../errors/UnauthorizedError';
import { useAuthStore } from '../../stores/auth';
import { errorAsNotification } from '../../utils/ui';
import {
  FAIL_FALLBACK_ROUTE, GuardName, Role, Severity,
} from './constants';

const parseGuard = (name: GuardName) => {
  const [role, severity] = name.split(':');
  return { role, severity } as ({role: Role, severity: Severity});
};

const authNavigationGuard: NavigationGuard = async (to) => {
  if (to.meta.guard) {
    const {
      user, isAdmin, isMember, refresh,
    } = useAuthStore();
    const { role, severity } = parseGuard(to.meta.guard);

    if (severity === 'strict') {
      await refresh();
    }

    if (role === 'admin' && !isAdmin) {
      if (user) {
        errorAsNotification(new UnathorizedError('Anda bukan admin!'));
        return false;
      }
      errorAsNotification(new UnathenticatedError());
      return FAIL_FALLBACK_ROUTE.ADMIN;
    }

    if (role === 'member' && !isMember) {
      errorAsNotification(new UnathenticatedError());
      return FAIL_FALLBACK_ROUTE.MEMBER;
    }

    if (role === 'guest' && user) {
      errorAsNotification(new Error('Anda telah masuk!'));
      return FAIL_FALLBACK_ROUTE.GUEST;
    }
  }

  return true;
};

export default authNavigationGuard;
