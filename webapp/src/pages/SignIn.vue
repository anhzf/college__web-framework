<template>
  <v-container fluid>
    <v-card
      class="mx-auto"
      max-width="500"
    >
      <v-row>
        <v-col justify="space-between">
          <v-col
            cols="auto"
            sm="12"
          >
            <div class="header">
              <h1>Sign In</h1>
            </div>
            <v-text-field
              label="Email"
              type="email"
              :rules="emailRules"
              required
            />
            <v-text-field
              label="Password"
              type="password"
              :rules="[v => !!v || 'Password harus di isi']"
              required
            />
            <v-checkbox
              v-model="checkbox"
              label="Tetap Masuk"
            />
            <v-btn
              :to="{name: 'SignIn'}"
              color="primary"
            >
              Sign In
            </v-btn>
            <p><a href="/signup">Belum punya akun? Klik disini</a></p>
            <p><a href="">Lupa Password?</a></p>
          </v-col>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>
<script>
export default {
  data: () => ({
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
