<template>
  <v-container fluid>
    <v-card class="mx-auto max-w-screen-sm">
      <v-card-title>
        Sign Up
      </v-card-title>

      <v-card-subtitle>
        Buat akun untuk lakukan reservasi ruangan dan fasilitas kami.
      </v-card-subtitle>

      <v-card-text>
        <v-row justify="space-between">
          <v-col justify="space-between">
            <v-col
              cols="auto"
              sm="12"
            >
              <v-form
                v-model="isFormValid"
                @submit.prevent="onSubmit"
              >
                <v-text-field
                  v-model="fields.name"
                  label="Nama Lengkap"
                  :rules="nameRules"
                  required
                />
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
                  required
                  :rules="passwordRules"
                  :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="showPassword ? 'text' : 'password'"
                  @click:append="showPassword = !showPassword"
                />
                <v-text-field
                  v-model="fields.password_confirmation"
                  label="Tulis ulang Password"
                  required
                  :rules="passwordConfirmationRules"
                  :type="showPassword ? 'text' : 'password'"
                />
                <v-switch
                  v-model="fields.iam_internal"
                  label="Saya anggota Civitas UNS"
                  color="primary"
                />

                <template v-if="fields.iam_internal">
                  <v-file-input
                    v-model="fields.internal_idcard_file"
                    accept="image/*"
                    label="Kartu Tanda Anggota"
                    :rules="idCardFileRules"
                    required
                  />
                  <v-text-field
                    v-model="fields.internal_id"
                    label="NIM Mahasiswa/NIP Dosen"
                    required
                  />
                </template>

                <v-btn
                  type="submit"
                  color="primary"
                  :disabled="!isFormValid"
                  class="w-full"
                >
                  Sign Up
                </v-btn>
              </v-form>

              <router-link :to="{name: 'SignIn'}">
                Sudah punya akun? Sign In
              </router-link>
            </v-col>
          </v-col>
        </v-row>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script lang="ts" setup>
import { reactive, ref } from 'vue';
import { auth } from '../api';
import router from '../router';
import { useAuthStore } from '../stores/auth';
import { catchErrorAsNotification, notify } from '../utils/ui';

const authStore = useAuthStore();
const isFormValid = ref(false);
const showPassword = ref(false);
const fields = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  iam_internal: false,
  internal_id: '',
  internal_idcard_file: [],
});
const onSubmit = () => catchErrorAsNotification(async () => {
  const payload = {
    name: fields.name,
    email: fields.email,
    password: fields.password,
    password_confirmation: fields.password_confirmation,
    internal_id: fields.internal_id,
    internal_idcard_file: fields.internal_idcard_file[0],
  };

  await auth.signUp(payload);
  notify.success('Berhasil mendaftar, silahkan cek email untuk verifikasi!');
  await authStore.refresh();
  await router.push({ name: 'Home' });
});

const MAX_UPLOADED_FILE_SIZE = 2048 * 1024; // 2MB
const nameRules = [
  (v: string) => !!v || 'Harap isi nama Anda',
];
const emailRules = [
  (v: string) => !!v || 'Harap isi E-mail Anda',
  (v: string) => /.+@.+\..+/.test(v) || 'E-mail harus valid',
];
const passwordRules = [(v: string) => !!v || 'Password harus di isi'];
const passwordConfirmationRules = [
  (v: string) => !!v || 'Password harus di isi',
  (v: string) => v === fields.password || 'Harus sama dengan password',
];
const idCardFileRules = [
  (v: any) => !!v || 'Harap sertakan bukti KTA',
  ([v]: any) => v instanceof File || 'Harus berupa file',
  ([v]: File[]) => v.size <= MAX_UPLOADED_FILE_SIZE || 'File terlalu besar',
];
</script>
