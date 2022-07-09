import { NavigationGuard } from 'vue-router';
import authNavigationGuard from './auth/guard';
import { ensureAuthenticationReady } from './ensureAuthenticationReady/guard';

// the orders mean that the first guard will be executed first
const navigationGuards: NavigationGuard[] = [
  ensureAuthenticationReady,
  authNavigationGuard,
];

export default navigationGuards;
