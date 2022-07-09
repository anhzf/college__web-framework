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

const throwUnathenticatedError = (msg?: string) => errorAsNotification(new UnathenticatedError(msg));
const throwUnathorizedError = (msg?: string) => errorAsNotification(new UnathorizedError(msg));
const throwUnverifiedError = (msg = 'email unverified') => errorAsNotification(new UnathorizedError(msg));

const routeGuardian = async (to: RouteLocation) => {
  if (to.meta.guard) {
    const auth = useAuthStore();

    const { role, severity } = parseGuard(to.meta.guard);

    if (auth.user) {
      if (severity === 'verified' && !auth.isVerified) {
        throwUnverifiedError();
        return false;
      }

      if (severity === 'internal' && !auth.isInternal) {
        throwUnathorizedError();
        return false;
      }
    }

    if (role === 'admin' && !auth.isAdmin) {
      if (auth.isMember) {
        throwUnathorizedError();
        return false;
      }
      throwUnathenticatedError();
      return FAIL_FALLBACK_ROUTE.ADMIN;
    }

    if (role === 'member' && !auth.user) {
      throwUnathenticatedError('you must login first');
      return FAIL_FALLBACK_ROUTE.MEMBER;
    }

    if (role === 'guest' && auth.user) {
      errorAsNotification(new Error('already logged in'));
      return FAIL_FALLBACK_ROUTE.GUEST;
    }
  }

  return true;
};

export default routeGuardian;
