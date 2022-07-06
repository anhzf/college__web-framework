<template>
  <v-container fluid>
    <v-col>
      <h2>Pengaturan</h2>
    </v-col>
    <v-list
      lines="three"
      select-strategy="multiple"
      max-width="400"
    >
      <v-list-subheader>Edit profile</v-list-subheader>
      <v-form
        ref="form"
        lazy-validation
      >
        <v-col
          cols="auto"
          sm="10"
        >
          <v-text-field
            label="Nama Lengkap"
            :rules="nameRules"
            required
          />
          <v-text-field
            label="Username"
          />
          <v-text-field
            label="Email"
            disabled
          />
          <v-text-field
            v-model="password"
            label="Password Baru"
            type="password"
            :rules="[v => !!v || 'Password harus di isi']"
            required
          />
          <v-btn
            :to="{name:''}"
            color="primary"
          >
            SIMPAN
          </v-btn>
        </v-col>
      </v-form>
    </v-list>
    <!-- <v-row>
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
    </v-row> -->
  </v-container>
</template>
<script>
export default {
  data: () => ({
    valid: true,
    name: '',
    nameRules: [
      (v) => !!v || 'Harap isi nama Anda',
    ],
  }),
};
</script>
<style>
.container {
  margin: 20px;
  padding: 20px;
}
</style>
