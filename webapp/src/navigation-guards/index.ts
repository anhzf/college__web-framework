import { NavigationGuard } from 'vue-router';
import authNavigationGuard from './auth/guard';

// the orders mean that the first guard will be executed first
const navigationGuards: NavigationGuard[] = [
  authNavigationGuard,
];

export default navigationGuards;
