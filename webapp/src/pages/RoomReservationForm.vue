<template>
  <v-container fluid>
    <v-row>
      <v-col cols="1">
        <div class="sticky top-20">
          <v-btn
            icon="mdi-arrow-left"
            @click="$router.back()"
          />
        </div>
      </v-col>
      <v-col>
        <v-card
          density="comfortable"
          class="mx-auto max-w-screen-md"
        >
          <v-card-title class="text-h5">
            Form Reservasi Ruangan
          </v-card-title>

          <v-card-subtitle />

          <v-card-text>
            <v-form
              id="f_create-room-reservation"
              v-model="isFormValid"
              lazy-validation
              @submit.prevent="onSubmit"
            >
              <v-select
                v-model="fields.room_id"
                label="Pilih Laboratorium"
                name="room"
                :items="availableRooms"
                :rules="[(v: string) => !!v || 'Ruangan harus di isi']"
                required
                :loading="!isAvailableRoomsReady"
              />
              <v-row>
                <v-col cols="8">
                  <v-text-field
                    v-model="fields.date"
                    label="Pilih Jadwal"
                    name="date"
                    type="datetime-local"
                    :rules="[v => !!v || 'Harap pilih jadwal peminjaman']"
                    :min="minReservationDay.toString()"
                    :max="maxReservationDay.toString()"
                    step="1800"
                    required
                  />
                </v-col>
                <v-col>
                  <v-text-field
                    v-model="fields.long"
                    label="Durasi"
                    name="long"
                    suffix="Menit"
                    type="number"
                    min="60"
                    max="300"
                    step="30"
                    :rules="[v => !!v || 'Harap isi durasi peminjaman']"
                    required
                  />
                </v-col>
              </v-row>
              <v-text-field
                v-model="fields.eventName"
                label="Nama Kegiatan"
                name="eventName"
                :rules="[v => !!v || 'Nama kegiatan harus diisi']"
                required
              />
              <v-textarea
                v-model="fields.eventDescription"
                label="Deskripsi Kegiatan (Opsional)"
                name="eventDescription"
                type="textarea"
              />
            </v-form>
          </v-card-text>

          <v-card-actions>
            <v-btn
              type="submit"
              form="f_create-room-reservation"
              :disabled="!isFormValid"
              prepend-icon="mdi-plus"
              color="primary"
              variant="elevated"
              class="w-full"
            >
              Pesan
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup lang="ts">
import { Temporal } from '@js-temporal/polyfill';
import { useAsyncState, useMemoize } from '@vueuse/core';
import { reactive, ref } from 'vue';
import { roomReservations, rooms } from '../api';
import router from '../router';
import { catchErrorAsNotification, notify } from '../utils/ui';

const getRoomSelection = useMemoize(async () => {
  const { data } = await rooms.all();
  return data.map((room) => ({
    title: room.name,
    value: room.id,
  }));
});

const isFormValid = ref(false);
const { state: availableRooms, isReady: isAvailableRoomsReady } = useAsyncState(getRoomSelection(), []);
const minReservationDay = Temporal.Now.instant().add({ hours: 24 })
  .toZonedDateTimeISO(Temporal.Now.timeZone()).startOfDay()
  .toPlainDateTime();
const maxReservationDay = Temporal.Now.instant().add({ hours: 24 * 14 })
  .toZonedDateTimeISO(Temporal.Now.timeZone()).startOfDay()
  .toPlainDateTime();
const fields = reactive({
  room_id: undefined as number | undefined,
  date: '',
  long: 60,
  eventName: '',
  eventDescription: '',
});

const onSubmit = () => catchErrorAsNotification(async () => {
  if (isFormValid.value) {
    const payload = {
      room_id: fields.room_id!,
      start: new Date(fields.date),
      long: fields.long,
      description_short: fields.eventName,
      description: fields.eventDescription,
    };

    await roomReservations.create(payload);
    notify.success('Pemesanan ruangan berhasil!');
    router.push({ name: 'RoomReservation' });
  }

  notify.error('Form tidak valid!');
});
</script>

<style>
.container {
  padding: 50px;
}
</style>
