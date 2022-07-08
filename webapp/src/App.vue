<template>
  <v-app :theme="isDark ? 'dark' : 'light'">
    <v-navigation-drawer v-model="leftDrawerIsOpen">
      <template #prepend>
        <v-list-item
          title="E-Nyilih"
          height="10vh"
        />
      </template>

      <v-divider />

      <v-list nav>
        <v-list-item
          prepend-icon="mdi-circle"
          title="Dasbor"
          :to="{name: 'Home'}"
        />
        <v-list-item
          prepend-icon="mdi-circle"
          title="Ruangan"
          subtitle="Jadwal dan Peminjaman"
          :to="{name: 'RoomReservation'}"
        />
        <v-list-item
          prepend-icon="mdi-circle"
          title="Fasilitas"
          subtitle="Peminjaman"
          :to="{name: 'FacilityReservation'}"
        />

        <v-list-subheader>Admin</v-list-subheader>

        <v-list-item
          prepend-icon="mdi-circle"
          title="Verifikasi Reservasi"
          :to="{name: 'ReservationVerification'}"
        />
        <v-list-item
          prepend-icon="mdi-circle"
          title="Member"
          subtitle="Kelola Member"
          :to="{name: 'MemberManagement'}"
        />
        <v-list-item
          prepend-icon="mdi-circle"
          title="Fasilitas"
          subtitle="Kelola Fasilitas"
          :to="{name: 'FacilityManagement'}"
        />
        <v-list-item
          prepend-icon="mdi-circle"
          title="Ruangan"
          subtitle="Kelola Ruangan"
          :to="{name: 'RoomManagement'}"
        />
        <v-list-item
          prepend-icon="mdi-circle"
          title="Pengaturan"
          :to="{name: 'Settings'}"
        />
        <v-spacer />
      </v-list>

      <template
        v-if="!auth.user"
        #append
      >
        <div class="pa-2">
          <v-btn
            prepend-icon="mdi-circle"
            :to="{name: 'SignIn'}"
            block
            color="primary"
          >
            Masuk Member
          </v-btn>
        </div>
      </template>
    </v-navigation-drawer>

    <v-app-bar>
      <v-app-bar-nav-icon @click="leftDrawerIsOpen = !leftDrawerIsOpen" />

      <v-spacer />

      <v-btn
        icon
        @click="rightDrawerIsOpen = !rightDrawerIsOpen"
      >
        <v-avatar v-if="auth.user">
          {{ userAvatarName }}
        </v-avatar>
        <v-avatar
          v-else
          icon="mdi-account"
          color="surface-variant"
        />
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer
      v-model="rightDrawerIsOpen"
      location="right"
      temporary
    >
      <template v-if="auth.user">
        <v-list>
          <v-list-item
            :title="auth.user.name"
            :subtitle="auth.user.email"
          >
            <template #prepend>
              <v-list-item-avatar start>
                {{ userAvatarName }}
              </v-list-item-avatar>
            </template>
          </v-list-item>
        </v-list>

        <v-divider />

        <v-list nav>
          <v-list-item
            prepend-icon="mdi-circle"
            title="Keluar"
            @click="onLogoutClick"
          />
        </v-list>

        <v-divider />
      </template>

      <template v-else>
        <v-list nav>
          <v-list-item
            prepend-icon="mdi-login"
            title="Masuk"
            :to="{name: 'SignIn'}"
            variant="tonal"
            color="primary"
          />
        </v-list>

        <v-divider />
      </template>

      <v-list nav>
        <v-list-item
          title="Dark Mode"
          prepend-icon="mdi-weather-night"
        >
          <template #append>
            <v-list-item-avatar
              end
              class="w-auto"
            >
              <v-switch
                v-model="isDark"
                color="secondary"
                hide-details
              />
            </v-list-item-avatar>
          </template>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-main>
      <router-view />

      <div class="absolute bottom-0 inset-x-0 pointer-events-none [&>*]:pointer-events-auto">
        <div class="notification-alert">
          <v-slide-y-reverse-transition group>
            <v-alert
              v-for="notification in notifications"
              :key="notification.id"
              elevated
              closable
              class="[&_.v-alert\_\_close_.v-icon:hover]:bg-slate-50/20"
              v-bind="notification.props"
            />
          </v-slide-y-reverse-transition>
        </div>

        <v-progress-linear
          :value="progressBarStore.loaded"
          :indeterminate="progressBarStore.loaded < 0"
        />
      </div>
    </v-main>

    <v-overlay
      :model-value="!auth.isReady"
      class="align-center justify-center"
    >
      <v-progress-circular
        indeterminate
        size="64"
        color="primary"
      />
    </v-overlay>
  </v-app>
</template>

<script lang="ts" setup>
import { computed, ref } from 'vue';
import { useDark } from '@vueuse/core';
import { useRouter } from 'vue-router';
import { useAuthStore } from './stores/auth';
import useNotificationAlerts from './stores/notificationAlerts';
import useProgressBarStore from './stores/progressBar';
import { useTranslations } from './lang';
import { notify } from './utils/ui';
import type { AnyTypedFn } from './utils/types';

const isDark = useDark();
const { notifications } = useNotificationAlerts();
const progressBarStore = useProgressBarStore();
const { load } = useTranslations();
const auth = useAuthStore();
const router = useRouter();
const leftDrawerIsOpen = ref(true);
const rightDrawerIsOpen = ref(false);
const userAvatarName = computed(() => auth.user?.name.split(' ').map((w) => w.at(0)).slice(0, 2).join('')
  .toUpperCase());

load();

const closeOnRightDrawerItemClick = <T extends [] = [], R = void>(handler: AnyTypedFn<R, T>) => (async (...args: T) => {
  const r = await Promise.resolve(handler(...args));
  if (rightDrawerIsOpen.value) {
    rightDrawerIsOpen.value = false;
  }
  return r;
});

const onLogoutClick = closeOnRightDrawerItemClick(async () => {
  await auth.signOut();
  router.push({ name: 'SignIn' });
  notify.success('Logged out!');
});
</script>

<style lang="sass">
.notification-alert
  @apply p-4 flex flex-col items-end gap-2.5
</style>
