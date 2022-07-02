import type { GuardName } from './navigation-guards/auth/constants';

declare module '@vue/runtime-core' {
  export interface GlobalComponents {
    RouterView: typeof import('vue-router')['RouterView'];
    RouterLink: typeof import('vue-router')['RouterLink'];
  }
}

declare module 'vue-router' {
  interface RouteMeta {
    guard?: GuardName;
  }
}

export {};
