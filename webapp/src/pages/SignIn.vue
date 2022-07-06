<template>
  <v-container fluid>
    <v-card
      tag="form"
      class="mx-auto"
      max-width="500"
      @submit.prevent="onSubmit"
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
              v-model="fields.email"
              label="Email"
              type="email"
              :rules="emailRules"
              required
            />
            <v-text-field
              v-model="fields.password"
              label="Password"
              type="password"
              :rules="[v => !!v || 'Password harus di isi']"
              required
            />
            <v-checkbox
              v-model="fields.remember"
              label="Tetap Masuk"
            />
            <v-btn
              type="submit"
              color="primary"
            >
              Sign In
            </v-btn>
            <p>
              <router-link to="/signup">
                Belum punya akun? Klik disini
              </router-link>
            </p>
            <p>
              <router-link to="/signin/forgetpassword">
                Lupa Password?
              </router-link>
            </p>
          </v-col>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script setup lang="ts">
import { reactive } from 'vue';
import { useAuthStore } from '../stores/auth';
import { catchErrorAsNotificationFn, notify } from '../utils/ui';
import __ from '../lang';

const auth = useAuthStore();
const fields = reactive({
  email: '',
  password: '',
  remember: false,
});
const emailRules = [
  (v: string) => !!v || 'Harap isi E-mail Anda',
  (v: string) => /.+@.+\..+/.test(v) || 'E-mail harus valid',
];
const onSubmit = catchErrorAsNotificationFn(async () => auth
  .signIn({
    email: fields.email,
    password: fields.password,
  }, fields.remember)
  .then(() => notify.success(__('logged in'))));

</script>

<style>
.header {
  text-align: center;
  font-size: 15px;
}
</style>
