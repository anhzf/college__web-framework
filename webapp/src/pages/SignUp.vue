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
            <v-text-field
              label="Nama"
            />
            <v-text-field
              label="Email"
            />
            <v-text-field
              label="Username"
            />
            <v-text-field
              label="Password"
            />
            <v-text-field
              label="Tulis ulang Password"
            />
            <v-checkbox
              v-model="checkbox"
              :label="`Daftar sebagai Civitas UNS`"
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
            <p><a href="">Sudah punya akun? Sign In</a></p>
          </v-col>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script setup>
import { ref } from 'vue';

const checkbox = ref(true);
</script>
<style>
.header {
  text-align: center;
  font-size: 15px;
}
</style>
