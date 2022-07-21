<template>
  <v-container fluid>
    <v-row>
      <v-col>
        <h1>
          Daftar reservasi anda
        </h1>
      </v-col>
    </v-row>

    <v-row v-if="reservations.length">
      <v-col
        v-for="el in reservations"
        :key="el.id"
        cols="12"
        md="6"
        lg="4"
      >
        <v-card>
          <v-card-title>
            {{ el.description_short }}
          </v-card-title>

          <v-card-subtitle>
            {{ el.reservable.name }}
          </v-card-subtitle>

          <v-card-text>
            <div class="flex items-center gap-4">
              <span>
                {{ el.start.toLocaleString() }}
              </span>
              <v-chip density="compact">
                {{ (el.long || 60) / 60 }} jam
              </v-chip>
              <v-chip
                v-if="isOnProgress(el.start, (el.long || 60) / 60)"
                color="warning"
                density="compact"
              >
                Sedang berjalan
              </v-chip>
            </div>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>

    <v-row v-else>
      <v-col>
        <p>Anda tidak memiliki reservasi untuk saat ini.</p>
      </v-col>
    </v-row>

    <v-row v-if="!auth.user">
      <v-col cols="auto">
        <v-btn
          prepend-icon="mdi-login"
          :to="{name: 'SignIn'}"
        >
          Masuk untuk membuat Reservasi
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts" setup>
import { useAsyncState, useMemoize } from '@vueuse/core';
import { users } from '../api';
import { useAuthStore } from '../stores/auth';
import { isOnProgress } from '../utils/datetime';
import { errorAsNotification } from '../utils/ui';

const auth = useAuthStore();
const getMyReservations = useMemoize(async () => {
  try {
    const { data } = await users.getMyReservations();
    return data;
  } catch (err) {
    errorAsNotification(err as Error);
    return [];
  }
});

const { state: reservations } = useAsyncState(getMyReservations(), []);
</script>
