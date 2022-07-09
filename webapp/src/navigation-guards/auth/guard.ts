import { NavigationGuard } from 'vue-router';
import routeGuardian from './routeGuardian';

const authNavigationGuard: NavigationGuard = routeGuardian;

export default authNavigationGuard;
