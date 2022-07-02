<template>
  <v-container fluid>
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
            <div class="header">
              <h1>Sign Up</h1>
            </div>
            <v-form
              ref="form"
              v-model="valid"
              lazy-validation
            >
              <v-text-field
                label="Nama Lengkap"
                :rules="nameRules"
                required
              />
              <v-text-field
                label="Email"
                :rules="emailRules"
                required
              />
              <v-text-field
                label="Username"
              />
              <v-text-field
                v-model="password"
                label="Password"
                :rules="[v => !!v || 'Password harus di isi']"
                required
              />
              <v-text-field
                label="Tulis ulang Password"
                required
              />
              <v-checkbox
                v-model="checkbox"
                label="Saya anggota Civitas UNS"
              />
              <v-file-input
                accept="image/*"
                label="Kartu Tanda Anggota"
                :rules="[v => !!v || 'Harap sertakan bukti KTA']"
                required
              />
              <v-text-field
                label="NIM Mahasiswa/NIP Dosen"
              />
              <v-btn
                :to="{name:'SignUp'}"
                color="primary"
              >
                Sign Up
              </v-btn>
            </v-form>
            <p>
              <router-link to="/signin">
                Sudah punya akun? Sign In
              </router-link>
            </p>
          </v-col>
        </v-col>
      </v-row>
    </v-card>
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
    email: '',
    emailRules: [
      (v) => !!v || 'Harap isi E-mail Anda',
      (v) => /.+@.+\..+/.test(v) || 'E-mail harus valid',
    ],
    checkbox: false,
  }),
};
</script>
<style>
.header {
  text-align: center;
  font-size: 15px;
}
</style>
