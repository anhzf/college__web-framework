<template>
  <v-container fluid>
    <v-row justify="space-between">
      <v-col>
        <h1>Jadwal Laboratorium</h1>
      </v-col>

      <v-col cols="auto">
        <v-btn prepend-icon="mdi-plus">
          Reservasi
        </v-btn>
      </v-col>
    </v-row>

    <v-row>
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
    </v-row>

    <v-row>
      <v-col>
        <v-table
          height="70vh"
          fixed-header
        >
          <thead>
            <tr>
              <th>Nama Lab</th>
              <th>Deskripsi Kegiatan</th>
              <th>Penanggung Jawab</th>
              <th>Waktu dan Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="lab in labList"
              :key="lab.id"
            >
              <td>{{ lab.labName }}</td>
              <td>{{ lab.eventDescription }}</td>
              <td>{{ lab.responsible }}</td>
              <td class="lab-reservation-datetime">
                <span>{{ lab.reservedDate.toLocaleString() }}</span>
                <v-chip density="compact">
                  {{ lab.reservedTime }} jam
                </v-chip>
                <v-chip
                  v-if="isOnProgress(lab)"
                  color="warning"
                  density="compact"
                >
                  Sedang berjalan
                </v-chip>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts" setup>
import { Temporal } from '@js-temporal/polyfill';
import { nanoid } from 'nanoid';
import QueryChip from '../components/QueryChip.vue';

interface LabReservation {
  id: string;
  labName: string;
  eventDescription: string;
  responsible: string;
  reservedDate: Date;
  reservedTime: number;
}

const isOnProgress = (reservation: LabReservation) => {
  const now = Temporal.Now.instant();
  const start = reservation.reservedDate.toTemporalInstant();
  const end = start.add({ hours: reservation.reservedTime });
  return Temporal.Instant.compare(now, start) >= 0 && Temporal.Instant.compare(now, end) <= 0;
};

const labList: LabReservation[] = [
  {
    id: nanoid(),
    labName: 'Software Engineering',
    eventDescription: 'Kuliah Praktikum',
    responsible: 'Rosihan Ari S.Pd',
    reservedDate: new Date('2022-01-01T09:00:00'),
    reservedTime: 2,
  },
  {
    id: nanoid(),
    labName: 'Network Admin',
    eventDescription: 'Kuliah Praktikum',
    responsible: 'Puspanda Hatta S.Pd',
    reservedDate: new Date('2022-05-01T09:00:00'),
    reservedTime: 3,
  },
  {
    id: nanoid(),
    labName: 'Multimedia',
    eventDescription: 'Workshop HMP Mikroptik',
    responsible: 'Krisna Murti',
    reservedDate: new Date('2022-06-18T20:00:00'),
    reservedTime: 6,
  },
];
// const labList = Array.from(Array(20), () => ({
//   id: nanoid(),
//   labName: 'Software Engineering',
//   eventDescription: 'Kuliah Praktikum',
//   responsible: 'Rosihan Ari S.Pd',
//   time: [new Date('2022-01-01T09:00:00'), new Date('2022-01-01T12:00:00')],
// }));
</script>

<style lang="sass">
.lab-reservation-datetime
  display: flex
  align-items: center
  gap: 0.5rem
</style>
