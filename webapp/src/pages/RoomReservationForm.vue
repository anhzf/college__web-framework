<template>
  <v-container fluid>
    <v-card
      class="mx-auto container"
      max-width="1000"
    >
      <v-row justify="space-between">
        <v-col justify="space-between">
          <v-img
            src="https://cdn-icons.flaticon.com/png/512/2821/premium/2821637.png?token=exp=1656580591~hmac=454037819d5cc58a89d7881fc92a83e0"
            height="200px"
          />
        </v-col>
        <v-col>
          <v-form
            ref="form"
            v-model="valid"
            lazy-validation
          >
            <v-col>
              <h2>Form Reservasi Laboratorium Member UNS</h2>
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-select
                v-model="select"
                :items="items"
                label="Pilih Laboratorium"
                :rules="[v => !!v || 'Laboratorium harus di isi']"
                required
              />
            </v-col>

            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Pilih Jadwal"
                type="datetime-local"
                :rules="[v => !!v || 'Harap pilih jadwal peminjaman']"
                required
              />
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Durasi (menit)"
                type="number"
                min="0"
                max="300"
                :rules="[v => !!v || 'Harap isi durasi peminjaman']"
                required
              />
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Nama Kegiatan"
                type="text"
                :rules="[v => !!v || 'Nama kegiatan harus diisi']"
                required
              />
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-textarea
                label="Deskripsi Kegiatan"
                type="textarea"
              />
            </v-col>
            <v-col>
              <v-btn
                :to="{name: ''}"
                prepend-icon="mdi-plus"
                color="primary"
              >
                PESAN
              </v-btn>
            </v-col>
          </v-form>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
  <v-container fluid>
    <v-card
      class="mx-auto container"
      max-width="1000"
    >
      <v-row>
        <v-col>
          <v-img
            src="https://cdn-icons.flaticon.com/png/512/2821/premium/2821637.png?token=exp=1656580591~hmac=454037819d5cc58a89d7881fc92a83e0"
            height="200px"
          />
        </v-col>
        <v-col>
          <v-form
            ref="form"
            v-model="valid"
            lazy-validation
          >
            <v-col>
              <h2>Form Reservasi Laboratorium Member Non UNS</h2>
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-select
                v-model="select"
                :items="items"
                label="Pilih Laboratorium"
                :rules="[v => !!v || 'Laboratorium harus di isi']"
                required
              />
            </v-col>

            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Pilih Jadwal"
                type="datetime-local"
                :rules="[v => !!v || 'Harap pilih jadwal peminjaman']"
                required
              />
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Durasi (menit)"
                type="number"
                min="0"
                max="300"
                :rules="[v => !!v || 'Harap isi durasi peminjaman']"
                required
              />
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Nama Kegiatan"
                type="text"
                :rules="[v => !!v || 'Nama kegiatan harus diisi']"
                required
              />
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-textarea
                label="Deskripsi Kegiatan"
                type="textarea"
              />
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-file-input
                accept="image/*"
                label="Bukti Pembayaran"
                :rules="[v => !!v || 'Harap sertakan bukti pembayaran']"
                required
              />
            </v-col>
            <v-col>
              <v-btn
                :to="{name: ''}"
                prepend-icon="mdi-plus"
                color="primary"
              >
                PESAN
              </v-btn>
            </v-col>
          </v-form>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    valid: true,
    select: null,
    items: ['Software Engineering', 'Computer Network and Instrumentation', 'Multimedia Studio'],
  }),
};
</script>
<style>
.container {
  padding: 50px;
}
</style>
