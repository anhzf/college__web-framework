<template>
  <v-container fluid>
    <h1>
      DAFTAR RESERVASI ANDA
    </h1>

    <v-row>
      <v-col>
        <v-card
          color="#99ccff"
          dark
        >
          <v-card-title class="text-h5">
            Software Engineering
          </v-card-title>

          <v-card-subtitle type="date-time">
            Waktu Reservasi
          </v-card-subtitle>

          <v-card-text>
            Deskripsi Kegiatan
          </v-card-text>
        </v-card>
      </v-col>
      <v-col>
        <v-card
          color="#FF99FF"
          dark
          @click="yntkts"
        >
          <v-card-title class="text-h5">
            Software Engineering
          </v-card-title>

          <v-card-subtitle type="date-time">
            Waktu Reservasi
          </v-card-subtitle>

          <v-card-text>
            Deskripsi Kegiatan
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts" setup>
import { getCurrentUser } from '../api/users';
import { catchErrorAsNotification } from '../utils/ui';

const throwErr = () => {
  throw new Error('asdsadasdas');
};

const yntkts = (() => {
  catchErrorAsNotification(async () => {
    console.log(await getCurrentUser());
  });
});
</script>
