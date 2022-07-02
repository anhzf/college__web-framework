import { defineStore } from 'pinia';
import {
  authenticate, revokeToken, signIn, SignInPayload, signOut,
} from '../api/auth';
import type { User } from '../types/models';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null as (null | User),
  }),
  getters: {
    // admin is member too
    isMember: (st) => ['member', 'admin'].includes(st.user!?.role),
    isAdmin: (st) => st.user?.role === 'admin',
  },
  actions: {
    async signIn(payload: SignInPayload) {
      this.user = await signIn(payload);
    },
    signOut,
    async refresh() {
      try {
        await authenticate();
      } catch (error) {
        revokeToken();
      }
    },
  },
});
