<template>
  <v-container fluid>
    <v-row>
      <v-col>
        <v-card
          class="mx-auto"
          max-width="500"
        >
          <v-row justify="space-between">
            <v-col justify="space-between">
              <v-col
                cols="auto"
                sm="12"
              >
                <h1>Kelola Fasilitas - Perbarui</h1>
                <v-text-field
                  label="Nama Fasilitas"
                  :rules="[v => !!v || 'Nama Fasilitas harus di isi']"
                  required
                />
                <v-text-field
                  label="Deskripsi"
                />
                <v-select
                  :items="items"
                  label="Pilih Laboratorium"
                />
                <v-textarea
                  solo
                  name="input-7-4"
                  label="Spesifikasi"
                />
                <v-file-input
                  accept="image/*"
                  label="Upload Foto"
                />
              </v-col>
              <v-col
                cols="12"
                md="6"
              >
                <v-btn
                  color="primary"
                >
                  Perbarui
                </v-btn>
              </v-col>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    items: ['Software Engineering', 'Computer Network and Instrumentation', 'Multimedia Studio'],
  }),
};
</script>
