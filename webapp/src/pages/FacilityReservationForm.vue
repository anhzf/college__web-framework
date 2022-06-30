<template>
  <v-container fluid>
    <v-card
      class="mx-auto container"
      max-width="1000"
    >
      <v-row justify="space-between">
        <v-col justify="space-between">
          <v-img
            src="https://cdn-icons-png.flaticon.com/512/2828/2828879.png"
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
              <h2>Form Peminjaman Fasilitas Member UNS</h2>
            </v-col>

            <v-col
              cols="auto"
              sm="10"
            >
              <v-select
                :items="items"
                label="Pilih Jenis Fasilitas"
              />
            </v-col>

            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Masukkan Jumlah"
                type="number"
                min="0"
              />
            </v-col>

            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Tanggal Pinjam"
                type="datetime-local"
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
      <v-row justify="space-between">
        <v-col justify="space-between">
          <v-img
            src="https://cdn-icons-png.flaticon.com/512/2828/2828879.png"
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
              <h2>Form Peminjaman Fasilitas Member Non UNS</h2>
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-select
                :items="items"
                label="Pilih Jenis Fasilitas"
              />
            </v-col>

            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Masukkan Jumlah"
                type="number"
                min="0"
              />
            </v-col>

            <v-col
              cols="auto"
              sm="10"
            >
              <v-text-field
                label="Tanggal Pinjam"
                type="datetime-local"
              />
            </v-col>
            <v-col
              cols="auto"
              sm="10"
            >
              <v-file-input
                accept="image/*"
                label="Bukti Pembayaran"
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
    items: ['Komputer', 'Router', 'Kamera'],
  }),
};
</script>
<style>
.container {
  padding: 50px;
}
</style>
