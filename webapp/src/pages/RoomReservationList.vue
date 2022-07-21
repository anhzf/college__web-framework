<template>
  <v-container fluid>
    <v-row class="items-center">
      <v-col cols="auto">
        <h1>Jadwal Ruangan</h1>
      </v-col>

      <v-col
        cols="auto"
        class="py-0"
      >
        <router-link
          to="/asdasd"
          class="text-subtitle-2"
        >
          Lihat daftar ruangan
        </router-link>
      </v-col>

      <v-spacer />

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
              v-for="room in list"
              :key="room.id"
            >
              <td>{{ room.roomName }}</td>
              <td>
                <router-link
                  :to="{name: 'RoomReservation_View', params: {roomId: room.id}}"
                  :title="__('View details')"
                  class="[&:-webkit-any-link]:text-inherit [&:-webkit-any-link]:hover:text-[rgb(var(--v-theme-primary))]"
                >
                  {{ room.eventDescription }}
                </router-link>
              </td>
              <td>{{ room.responsible }}</td>
              <td class="room-reservation-datetime">
                <span>{{ room.reservedDate.toLocaleString() }}</span>
                <v-chip density="compact">
                  {{ room.reservedTime }} jam
                </v-chip>
                <v-chip
                  v-if="isOnProgress(room.reservedDate, room.reservedTime)"
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
import { useAsyncState } from '@vueuse/core';
import { roomReservations } from '../api';
import QueryChip from '../components/QueryChip.vue';
import { RoomReservation } from '../types/models';
import { isOnProgress } from '../utils/datetime';

interface NormalizedRoomReservation {
  id: string;
  roomName: string;
  eventDescription: string;
  responsible: string;
  reservedDate: Date;
  reservedTime: number;
}

const normalizeRoomReservationSchema = (data: RoomReservation): NormalizedRoomReservation => ({
  id: data.id.toString(),
  roomName: data.reservable.name,
  eventDescription: data.description_short,
  responsible: data.user.name,
  reservedDate: new Date(data.start),
  reservedTime: data.long === null ? 1 : data.long / 60,
});

const getRoomReservations = async () => {
  const { data } = await roomReservations.all();
  return data.map(normalizeRoomReservationSchema);
};

const { state: list } = useAsyncState(getRoomReservations(), []);
</script>

<style lang="sass">
.room-reservation-datetime
  display: flex
  align-items: center
  gap: 0.5rem
</style>
