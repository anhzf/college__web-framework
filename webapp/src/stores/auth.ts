import { useAsyncState } from '@vueuse/core';
import { defineStore } from 'pinia';
import {
  computed, readonly, ref, watch,
} from 'vue';
import { auth, users } from '../api';
import routeGuardian from '../navigation-guards/auth/routeGuardian';
import type { UserDetails } from '../types/models';
import router from '../router';

export const useAuthStore = defineStore('auth', () => {
  const user = ref<UserDetails | null>();
  const isVerified = computed(() => user.value?.email_verified_at);
  const isInternal = computed(() => user.value?.is_internal);
  const isMember = computed(() => isVerified.value && ['member', 'admin'].includes(user.value?.role || ''));
  const isAdmin = computed(() => isVerified.value && (user.value?.role === 'admin'));
  const refresh = async () => {
    try {
      user.value = await users.getCurrentUser();
    } catch (err) {
      user.value = null;
      auth.revokeToken();
    }
  };
  const { isReady } = useAsyncState(async () => {
    await refresh();
    return true;
  }, false);

  const signIn = async (payload: auth.SignInPayload, remember = false) => {
    user.value = await auth.signIn(payload, remember);
  };
  const signOut = () => {
    auth.signOut();
    user.value = null;
  };

  watch(user, async () => {
    const currRoute = router.currentRoute.value;

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
  });

  return {
    user: readonly(user),
    isMember,
    isAdmin,
    isVerified,
    isInternal,
    isReady: readonly(isReady),
    signIn,
    signOut,
    refresh,
  };
});
