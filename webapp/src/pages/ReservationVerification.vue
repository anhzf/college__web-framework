<template>
  <v-container fluid>
    <v-row justify="space-between">
      <v-col>
        <h1>Verifikasi Reservasi</h1>
      </v-col>
    </v-row>
    <!-- <v-row>
      <v-col>
        <v-chip-group
          :model-value="[]"
          column
        >
          <query-chip
            :label="v => `Lab: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Nama Laboratorium"
            sortable
          />
          <query-chip
            :label="v => `Penanggung Jawab: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Penanggung Jawab"
            sortable
          />
          <query-chip
            :label="v => `Waktu: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Waktu"
            sortable
          />
          <query-chip
            :label="v => `Kegiatan: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Kegiatan"
            sortable
          />
          <query-chip
            :label="v => `Status: ${v || 'belum lewat'}`"
            hint="Saring hasil berdasarkan"
            input-label="Status"
            sortable
            sort-by="asc"
          />
        </v-chip-group>
      </v-col>
    </v-row> -->

    <v-row>
      <v-col>
        <v-table
          height="70vh"
          fixed-header
        >
          <thead>
            <tr>
              <th>Nama Ruangan/Fasilitas</th>
              <th>Deskripsi Kegiatan</th>
              <th>Waktu dan Tanggal</th>
              <th class="text-center">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="el in list"
              :key="el.id"
            >
              <td>{{ el.reservable.name }}</td>
              <td>{{ el.description_short }}</td>
              <td class="flex items-center gap-2">
                <span>
                  {{ el.start.toLocaleString() }}
                </span>
                <v-chip density="compact">
                  {{ (el.long || 60) / 60 }} jam
                </v-chip>
              </td>
              <td>
                <div class="flex justify-end items-center gap-2.5">
                  <v-btn
                    prepend-icon="mdi-check"
                    variant="flat"
                    color="secondary"
                    size="small"
                    @click="onAcceptReservationClick(el.id)"
                  >
                    Terima
                  </v-btn>
                  <v-btn
                    prepend-icon="mdi-close"
                    variant="flat"
                    color="error"
                    size="small"
                    @click="onRejectReservationClick(el.id)"
                  >
                    Tolak
                  </v-btn>
                </div>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts" setup>
import { useAsyncState } from '@vueuse/core';
import { admin, reservations } from '../api';
import __ from '../lang';
import { catchErrorAsNotification, notify } from '../utils/ui';

type KeyType = number;

const { state: list } = useAsyncState(reservations.all(), []);

const onAcceptReservationClick = (id: KeyType) => catchErrorAsNotification(async () => {
  admin.verifyReservation(id, true);
  notify.success(__('Reservation accepted'));
});

const onRejectReservationClick = (id: KeyType) => catchErrorAsNotification(async () => {
  admin.verifyReservation(id, false);
  notify.success(__('Reservation rejected'));
});
</script>
