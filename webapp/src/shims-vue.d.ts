import __ from './lang';
import type { GuardName } from './navigation-guards/auth/constants';

declare module '@vue/runtime-core' {
  export interface GlobalComponents {
    RouterView: typeof import('vue-router')['RouterView'];
    RouterLink: typeof import('vue-router')['RouterLink'];
  }

  export interface ComponentCustomProperties {
    __: typeof __;
  }
}

declare module 'vue-router' {
  interface RouteMeta {
    guard?: GuardName;
  }
}

export {};
