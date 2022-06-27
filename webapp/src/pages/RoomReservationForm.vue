<template>
  <v-container fluid>
    <v-form
      ref="form"
      v-model="valid"
      lazy-validation
    >
      <h2>Form Reservasi Laboratorium Member UNS</h2>
      <v-col
        cols="auto"
        sm="6"
      >
        <v-select
          :items="items"
          label="Pilih Laboratorium"
        />
      </v-col>

      <v-col
        cols="auto"
        sm="6"
      >
        <v-text-field
          label="Pilih Jadwal"
          type="datetime-local"
        />
      </v-col>

      <v-btn
        :to="{name: ''}"
        prepend-icon="mdi-plus"
      >
        PESAN
      </v-btn>
    </v-form>
  </v-container>
  <v-container fluid>
    <v-form
      ref="form"
      v-model="valid"
      lazy-validation
    >
      <h2>Form Reservasi Laboratorium Member Non UNS</h2>
      <v-col
        cols="auto"
        sm="6"
      >
        <v-select
          :items="items"
          label="Pilih Laboratorium"
        />
      </v-col>

      <v-col
        cols="auto"
        sm="6"
      >
        <v-text-field
          label="Pilih Jadwal"
          type="datetime-local"
        />
      </v-col>

      <v-col
        cols="auto"
        sm="6"
      >
        <v-file-input
          accept="image/*"
          label="Bukti Pembayaran"
        />
      </v-col>

      <v-btn
        :to="{name: ''}"
        prepend-icon="mdi-plus"
      >
        PESAN
      </v-btn>
    </v-form>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    items: ['Software Engineering', 'Computer Network and Instrumentation', 'Multimedia Studio'],
  }),
};
</script>
