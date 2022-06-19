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

      <template #append>
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
        <v-avatar>AN</v-avatar>
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer
      v-model="rightDrawerIsOpen"
      location="right"
      temporary
    >
      <v-list>
        <v-list-item
          title="Alwan Nuha"
          subtitle="me@anhzf.dev"
        >
          <template #prepend>
            <v-list-item-avatar start>
              AN
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
    </v-main>
  </v-app>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { useDark } from '@vueuse/core';
import type { AnyTypedFn } from './utils/types';

const isDark = useDark();
const leftDrawerIsOpen = ref(true);
const rightDrawerIsOpen = ref(false);

const closeOnRightDrawerItemClick = <R = void, T = [], Fn extends AnyTypedFn<R, T> = AnyTypedFn<R, T>>(handler: Fn) => (async (...args: T[]) => {
  const r = await Promise.resolve(handler(...args));
  if (rightDrawerIsOpen.value) {
    rightDrawerIsOpen.value = false;
  }
  return r;
});

const onLogoutClick = closeOnRightDrawerItemClick(() => alert('logged out!'));
</script>
