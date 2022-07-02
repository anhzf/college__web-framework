import type { RouteLocationRaw } from 'vue-router';

export const ROLES = ['guest', 'member', 'admin'] as const;
export type Role = typeof ROLES[number];

export const SEVERITY_LEVEL = ['strict'] as const;
export type Severity = typeof SEVERITY_LEVEL[number];

export type GuardName = Role | `${Role}:${Severity}`;

export const FAIL_FALLBACK_ROUTE: Record<Uppercase<Role>, RouteLocationRaw> = {
  GUEST: { name: 'Home' },
  MEMBER: { name: 'SignIn' },
  ADMIN: { name: 'SignIn' },
};
