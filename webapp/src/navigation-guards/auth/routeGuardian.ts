import { RouteLocation } from 'vue-router';
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

const routeGuardian = async (to: RouteLocation) => {
  if (to.meta.guard) {
    const auth = useAuthStore();

    const { role, severity } = parseGuard(to.meta.guard);

    if (severity === 'strict') {
      await auth.refresh();
    }

    if (role === 'admin' && !auth.isAdmin) {
      if (auth.isMember) {
        errorAsNotification(new UnathorizedError('Anda bukan admin!'));
        return false;
      }
      errorAsNotification(new UnathenticatedError());
      return FAIL_FALLBACK_ROUTE.ADMIN;
    }

    if (role === 'member' && !auth.isMember) {
      errorAsNotification(new UnathenticatedError());
      return FAIL_FALLBACK_ROUTE.MEMBER;
    }

    if (role === 'guest' && auth.user) {
      errorAsNotification(new Error('Anda telah masuk!'));
      return FAIL_FALLBACK_ROUTE.GUEST;
    }
  }

  return true;
};

export default routeGuardian;
