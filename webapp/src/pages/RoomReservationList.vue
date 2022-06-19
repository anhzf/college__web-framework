<template>
  <v-container fluid>
    <v-row justify="space-between">
      <v-col>
        <h1>Jadwal Ruangan</h1>
      </v-col>

      <v-col cols="auto">
        <v-btn
          :to="{name: 'RoomReservation_Create'}"
          prepend-icon="mdi-plus"
        >
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
            :label="v => `Ruangan: ${v || 'semua'}`"
            hint="Saring hasil berdasarkan"
            input-label="Nama Ruangan"
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
              <th>Nama Ruangan</th>
              <th>Deskripsi Kegiatan</th>
              <th>Penanggung Jawab</th>
              <th>Waktu dan Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="room in roomList"
              :key="room.id"
            >
              <td>{{ room.roomName }}</td>
              <td>{{ room.eventDescription }}</td>
              <td>{{ room.responsible }}</td>
              <td class="room-reservation-datetime">
                <span>{{ room.reservedDate.toLocaleString() }}</span>
                <v-chip density="compact">
                  {{ room.reservedTime }} jam
                </v-chip>
                <v-chip
                  v-if="isOnProgress(room)"
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

interface RoomReservation {
  id: string;
  roomName: string;
  eventDescription: string;
  responsible: string;
  reservedDate: Date;
  reservedTime: number;
}

const isOnProgress = (reservation: RoomReservation) => {
  const now = Temporal.Now.instant();
  const start = reservation.reservedDate.toTemporalInstant();
  const end = start.add({ hours: reservation.reservedTime });
  return Temporal.Instant.compare(now, start) >= 0 && Temporal.Instant.compare(now, end) <= 0;
};

const roomList: RoomReservation[] = [
  {
    id: nanoid(),
    roomName: 'Software Engineering',
    eventDescription: 'Kuliah Praktikum',
    responsible: 'Rosihan Ari S.Pd',
    reservedDate: new Date('2022-01-01T09:00:00'),
    reservedTime: 2,
  },
  {
    id: nanoid(),
    roomName: 'Network Admin',
    eventDescription: 'Kuliah Praktikum',
    responsible: 'Puspanda Hatta S.Pd',
    reservedDate: new Date('2022-05-01T09:00:00'),
    reservedTime: 3,
  },
  {
    id: nanoid(),
    roomName: 'Multimedia',
    eventDescription: 'Workshop HMP Mikroptik',
    responsible: 'Krisna Murti',
    reservedDate: new Date('2022-06-18T20:00:00'),
    reservedTime: 6,
  },
];
</script>

<style lang="sass">
.room-reservation-datetime
  display: flex
  align-items: center
  gap: 0.5rem
</style>
