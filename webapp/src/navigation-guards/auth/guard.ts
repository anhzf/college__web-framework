import { NavigationGuard } from 'vue-router';
import routeGuardian from './routeGuardian';

// const authNavigationGuard: NavigationGuard = async (to, from) => routeGuardian(to);
const authNavigationGuard: NavigationGuard = async (to, from) => true;

export default authNavigationGuard;
