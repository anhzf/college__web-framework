<template>
  <v-container fluid>
    <v-row align="center">
      <v-col
        class="d-flex"
        cols="12"
        sm="6"
      >
        <v-select
          :items="items"
          label="Pilih Laboratorium"
        />
      </v-col>
    </v-row>
    <v-row align="center">
      <v-col
        class="d-flex"
        cols="12"
        sm="6"
      >
        <v-select
          :items="date"
          label="Pilih Jadwal"
        />
      </v-col>
    </v-row>
    <v-row align="center">
      <v-col
        class="d-flex"
        cols="12"
        sm="6"
      >
        <v-file-input
          accept="image/*"
          label="Bukti Pembayaran"
        />
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    items: ['RPL', 'Jaringan', 'Multimedia'],
  }),
};
</script>
