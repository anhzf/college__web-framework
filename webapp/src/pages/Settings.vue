<template>
  <v-container fluid>
    <v-row justify="space-between">
      <v-col>
        <h1>Pengaturan</h1>
      </v-col>
    </v-row>
    <v-row>
      <v-card
        class="container"
        max-width="500"
      >
        <v-card-title>
          <div>
            <h3>Akun Pengguna</h3>
          </div>
        </v-card-title>
        <v-card-text>
          <div>
            <a href="/settings/editprofile">Edit Profil</a>
          </div>
          <div>
            <a href="">Verifikasi Email</a>
          </div>
        </v-card-text>
      </v-card>
    </v-row>
  </v-container>
</template>
<style>
.container {
  margin: 10px;
  padding: 10px;
}
</style>
