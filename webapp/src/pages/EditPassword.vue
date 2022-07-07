<template>
  <v-container fluid>
    <v-card
      class="mx-auto"
      max-width="300"
    >
      <v-toolbar
        color="success"
        dark
      >
        <v-toolbar-title>
          Ubah Password
        </v-toolbar-title>
      </v-toolbar>
      <v-list
        class="mx-auto container"
      >
        <v-row>
          <v-col cols="10">
            <v-text-field
              density="comfortable"
              label="Password Lama"
              variant="underlined"
            />
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="10">
            <v-text-field
              density="comfortable"
              label="Password Baru"
              variant="underlined"
            />
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="10">
            <v-text-field
              density="comfortable"
              label="Ulangi Password Baru"
              variant="underlined"
            />
          </v-col>
        </v-row>
        <v-row>
          <v-col
            cols="auto"
          >
            <router-link to="">
              <v-btn
                color="primary"
              >
                SIMPAN
              </v-btn>
            </router-link>
          </v-col>
        </v-row>
      </v-list>
    </v-card>
  </v-container>
</template>

<style>
.container {
  margin: 20px;
  padding: 20px;
}
</style>
