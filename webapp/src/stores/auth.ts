import { useAsyncState } from '@vueuse/core';
import { defineStore } from 'pinia';
import {
  computed, readonly, ref, watch,
} from 'vue';
import { useRouter } from 'vue-router';
import { auth, users } from '../api';
import routeGuardian from '../navigation-guards/auth/routeGuardian';
import { silentNextErrorNotifcation } from '../utils/ui';
import type { User } from '../types/models';

export const useAuthStore = defineStore('auth', () => {
  const user = ref<User | null>();
  const isVerified = computed(() => user.value?.email_verified_at);
  const isMember = computed(() => isVerified.value && ['member', 'admin'].includes(user.value?.role || ''));
  const isAdmin = computed(() => isVerified.value && (user.value?.role === 'admin'));
  const refresh = async () => {
    try {
      const { data } = await users.getCurrentUser();
      user.value = data;
    } catch (err) {
      auth.revokeToken();
    }
  };
  const { isReady } = useAsyncState(async () => {
    try {
      await auth.authenticate();
      await refresh();
    } catch (err) {
      user.value = null;
      auth.revokeToken();
    }
    return true;
  }, false);

  const signIn = async (payload: auth.SignInPayload) => {
    silentNextErrorNotifcation();
    user.value = await auth.signIn(payload);
  };
  const signOut = () => {
    auth.signOut();
    user.value = null;
  };

  watch(user, async () => {
    const router = useRouter();
    const currRoute = router?.currentRoute.value;

    if (currRoute) {
      const redirect = await routeGuardian(currRoute);
      switch (redirect) {
        case true:
          break;

        case false:
          await router.push({ name: 'Home' });
          break;

        default:
          await router.push(redirect);
          break;
      }
    }
  });

  return {
    user,
    isMember,
    isAdmin,
    isVerified,
    isReady: readonly(isReady),
    signIn,
    signOut,
    refresh,
  };
});
